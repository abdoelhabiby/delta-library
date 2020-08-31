<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{


    public function index()
    {
        $contacts = Contact::orderBy('id','desc')->get();

        return view('admin.contacts.index',compact('contacts'));
    }


    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function response(Contact $contact,Request $request)
    {

        $validate = $request->validate(['response' => "required|string"]);

        try {


           $contact->update(['response' => $validate['response']]);

           //fire event send email

            return redirect()->route('admin.contactUs.index')->with(['success' => __("admin.success create")]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => __("admin.message error")]);
        }

    }



    public function store(ContactUsRequest $request)
    {
        try {
            Contact::create($request->validated());

            return redirect()->back()->with(['success' => "تم ارسال طلبك وسيتم الرد عليك علي بريدك الالتروني قريبا"]);

        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);

        }

    }



}
