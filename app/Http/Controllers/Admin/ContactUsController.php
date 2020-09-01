<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ResponseContactUs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactUsRequest;

class ContactUsController extends Controller
{


    public function index()
    {



        $contacts = Contact::orderBy('id', 'desc')->get();

        return view('admin.contacts.index', compact('contacts'));
    }


    public function show(Contact $contact)
    {
        //return $contact;

        return view('admin.contacts.show', compact('contact'));
    }

    public function response(Contact $contact, Request $request)
    {

        $validate = $request->validate(['response' => "required|string"]);



        try {

            $data = [
                'body' => $validate['response'],
                "owner_body" => admin()->name

            ];

            $date = date('Y-m-d H:i:s', strtotime(Carbon::now()));

            $contact->update(['was_answered_in' => $date]);
            $contact->messageResponses()->create($data);


            $response = ['name' => $contact->name,'response' => $data['body']];
            Mail::to($contact->email)->send(new ResponseContactUs($response));

            return redirect()->route('admin.contactUs.index')->with(['success' => __("admin.success create")]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => __("admin.message error")]);
        }
    }



    public function store(ContactUsRequest $request)
    {
        try {

            $email = $request->email;

            $data = [
                "name" => $request->name,
                "email" => $request->email,
                "message" => $request->message,
            ];

            $check_email_in_tabel = Contact::where("email", $data['email'])->first();


            if ($check_email_in_tabel) {

                $create = [
                    "owner_body" => $check_email_in_tabel->email,
                    "body" => $data['message']
                ];

                 $check_email_in_tabel->messageResponses()->create($create);
                return redirect()->back()->with(['success' => "تم ارسال طلبك وسيتم الرد عليك علي بريدك الالتروني قريبا"]);

            }

          $contact = Contact::create(['name' => $data['name'], "email" => $data['email']]);

          $contact->messageResponses()->create([
                "owner_body" => $contact->email,
                "body" => $data['message']
          ]);





            return redirect()->back()->with(['success' => "تم ارسال طلبك وسيتم الرد عليك علي بريدك الالتروني قريبا"]);
        } catch (\Throwable $th) {
            return redirect()->back()->with(['error' => 'حدث خطأ يرجي المحاوله في وقت لاحق']);
        }
    }
}
