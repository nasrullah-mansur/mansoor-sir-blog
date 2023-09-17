<?php

namespace App\Http\Controllers;

use App\DataTables\SubscriberDataTable;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index(SubscriberDataTable $dataTable)
    {
        return $dataTable->render('back.subscriber.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $sub = new Subscriber();
        $sub->email = $request->email;
        $sub->name = $request->name;

        $exist = Subscriber::where('email', $request->email)->first();

        if (!$exist) {
            $sub->save();
        }


         if($request->has('access')) {
            return redirect()->to($request->drive_link);

        } else {

            return redirect()->back()->with('subscribed', 'Thank you');
        }
    }

    public function delete(Request $request)
    {
        $sub = Subscriber::where('id', $request->id)->firstOrFail();

        $sub->delete();
    }
}
