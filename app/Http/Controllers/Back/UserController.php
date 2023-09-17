<?php

namespace App\Http\Controllers\Back;

use App\Models\User;
use Illuminate\Http\Request;
use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('back.user.index');
    }

    public function create()
    {
        return view('back.user.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|min:8',
            'confirm' => 'required|same:password'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('admin.user')->with('success', 'New person added successfully');
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return view('back.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'nullable|min:8',
            'phone' => 'required',
            'confirm' => 'nullable|same:password'
        ]);

        $user = User::where('id', $id)->firstOrFail();
        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.user')->with('success', 'Profile updated successfully');
    }

    public function delete(Request $request)
    {
        $user = User::where('id', $request->id)->firstOrFail();

        if ($request->id == Auth::guard('admin')->user()->id) {
            return $response = [
                'type' => 'error',
                'text' => 'Your can\'t remove your own account, Please contact admin'
            ];
        } else {

            $user->delete();
        }
    }
}
