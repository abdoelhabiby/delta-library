<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            "full_name" => "required|string|max:150|unique:students,full_name",
            "student_id" => "required|string|max:150|unique:students,student_id",
            "level" => "required|".Rule::in(1,2,3,4),
            "phone" => "sometimes|nullable|string|max:60",
            "active" => "required|in:1,0",
            "password" => "required|string|min:4|confirmed"
        ];

        if(in_array($this->getMethod(), ['PUT','PATCH'])){
            $rules['student_id']    = "required|string|max:150|".Rule::unique("students",'full_name')->ignore($this->student);
            $rules['full_name']  = "required|string|max:150|" . Rule::unique("students", 'student_id')->ignore($this->student);
            $rules['password'] = "sometimes|nullable|min:6|string|confirmed";
        }

        return $rules;

    }


    public function messages()
    {
        return [
            "level.required" => __("admin.required_level"),
            "level.in" => __("admin.required_level_in"),
        ];
    }

    public function attributes()
    {
        return[
            "full_name" => __("admin.full_name"),
        ];
    }
}
