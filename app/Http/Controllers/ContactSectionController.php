<?php

namespace App\Http\Controllers;

use App\Models\ContactSection;
use Illuminate\Http\Request;

class ContactSectionController extends Controller
{
    public function edit()
    {
        $contact = ContactSection::first();
        return view('back.sections.contact_section.create', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = ContactSection::first();

        if (!$contact) {
            $contact = new ContactSection();
        }

        $contact->section_title = $request->section_title;
        $contact->form_title = $request->form_title;
        $contact->form_description = $request->form_description;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->save();

        return redirect()->route('contact.section')->with('success', 'Contact section update successfully');
    }
}
