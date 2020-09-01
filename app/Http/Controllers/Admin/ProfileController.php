<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $profile = admin();
        return view("admin.profile.index",compact('profile'));
    }


    public function edit()
    {
        $profile = admin();
        return view("admin.profile.edit", compact('profile'));
    }


    public function update(ProfileRequest $request)
    {
        try {

            $validated = [
                "name" => $request->name,
                "email" => $request->email,
            ];

            if ($request->has('password')) {
                $validated["password"] = bcrypt($request->password);
            }


            if ($request->has('photo')) {
                $path = imageUpload($request->photo, "admins");
                $validated['photo'] = $path;

                if (admin()->photo != "images/user_default.png") {
                    deleteFile(admin()->photo);
                }
            }

               admin()->update($validated);

               return redirect()->route('admin.profile')->with(['success' => __("admin.success create")]);

        } catch (\Throwable $th) {
            return redirect(route("admin.profile"))->with(['error' => __("admin.message error")]);

        }
    }
}
