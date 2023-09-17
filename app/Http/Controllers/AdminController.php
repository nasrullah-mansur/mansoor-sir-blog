<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\DataTables\AdminDataTable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(AdminDataTable $dataTable)
    {
        return $dataTable->render('back.admin.index');
    }

    public function create()
    {
        return view('back.admin.create');
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

        $user = new Admin();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect()->route('admin.admin')->with('success', 'New person added successfully');
    }

    public function edit($id)
    {
        $user = Admin::where('id', $id)->firstOrFail();
        return view('back.admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'nullable|min:8',
            'phone' => 'required',
            'confirm' => 'nullable|same:password'
        ]);

        $user = Admin::where('id', $id)->firstOrFail();
        $user->name = $request->name;
        $user->phone = $request->phone;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.admin')->with('success', 'Profile updated successfully');
    }

    public function delete(Request $request)
    {
        $user = Admin::where('id', $request->id)->firstOrFail();

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
