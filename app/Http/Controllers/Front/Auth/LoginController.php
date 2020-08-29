<?php

namespace App\Http\Controllers\Front\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{

    public $redirectTo;

    public function login()
    {
          session(['test' => URL::previous()]);

        return view("front.login");
    }


    public function loginSubmit(Request $request)
    {

        try {

            $rules = [
                "student_id" => "required|string",
                "password" => "required|string",
            ];

            $attributes = ["student_id" => "اسم المستخدم"];

            $validated = $request->validate($rules, [], $attributes);

            if(auth()->guard('web')->attempt([
                "student_id" => $validated['student_id'],
                "password" => $validated['password']
            ])){


                return redirect(session()->get('test') ?? '/');

            }

            return redirect()->route('login')->with(['error' => "يرجي ادخال بيانات صحيحه"]);

        } catch (\Exception $ex) {

            return redirect()->route('login')->with(['error' => "يرجي ادخال بيانات صحيحه"]);

        }
    }


    public function logout()
    {
        auth()->guard('web')->logout();

        return redirect()->route('login');
    }
}
