<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\DataTables\ContactDataTable;
use App\Mail\ReplyMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('back.contact.index');
    }

    // ****************************** Contact ******************************
    public function contact_store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'message' => 'required|string',
            'subject' => 'required|string|max:255',
        ]);

        $con = new Contact();
        $con->first_name = $request->first_name;
        $con->last_name = $request->last_name;
        $con->email = $request->email;
        $con->phone = $request->phone;
        $con->subject = $request->subject;
        $con->message = $request->message;
        $con->save();

        return redirect()->back()->with('success', 'Thank you for sending your message, We will get back in touch soon.');
    }

    public function show($id)
    {
        $con = Contact::where('id', $id)->firstOrFail();
        return view('back.contact.show', compact('con'));
    }

    public function delete(Request $request)
    {
        $con = Contact::where('id', $request->id)->firstOrFail();

        $con->delete();
    }

    public function reply(Request $request)
    {
        $request->validate([
            'message' => 'required',
        ]);

        Mail::to($request->email)->send(new ReplyMail($request));

        return redirect()->back()->with('success', 'Email send successfully');
    }

    // ============= Front page ================;
    public function front_page()
    {
        return view('front.contact.index');
    }
}
