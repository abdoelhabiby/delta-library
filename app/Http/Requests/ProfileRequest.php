<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|string|min:3,max:150',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|string|confirmed',
            'photo'  => 'sometimes|nullable|image|mimes:png,jpg,jpeg',

        ];

        if (in_array($this->getMethod(), ['PUT', 'PATCH'])) {

            $rules['email'] = "required|email|" . Rule::unique("admins", "email")->ignore(admin());
            $rules['password'] = "sometimes|nullable|min:6|string|confirmed";
            $rules['photo'] = 'sometimes|nullable|image|mimes:png,jpg,jpeg';
        }



        return $rules;
    }
}
