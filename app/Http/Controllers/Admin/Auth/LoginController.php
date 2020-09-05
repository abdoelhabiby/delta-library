<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function showLoginForm(){

        session(['admin_redirect_to' => URL::previous()]);

        return view("admin.auth.login");
    }


    public function login(Request $request){

        // check validation

        $validate = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

         $remeber = $request->has("remember") ? true : false;

         if(auth()->guard("admin")->attempt([
             "email" => $request->email , "password" => $request->password
         ],$remeber)){

            return redirect(session()->get('admin_redirect_to') ?? '/dashboard');

         }



         session()->flash("failed", __("admin.login_failed"));

         return redirect()->back();



    }




    public function logout(){
        try{

            auth('admin')->logout();

            return redirect()->route("admin.login");


        }catch(\Exception $ex){
            return redirect()->route("admin.login");

        }


    }






}
