<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
           "name" => "required|string|max:180|unique:books,name",
           "description" => "required|string|min:5",
           "photo" => "sometimes|nullable|image|mimes:png,jpg,jpeg",
           "active" => "required|in:0,1",
           "category_id" => "sometimes|nullable|numeric|exists:categories,id"
        ];

        if(in_array($this->getMethod(),['PUT','PATCH'])){
            $rules['name'] = "required|string|max:180|". Rule::unique("books","name")->ignore($this->book);
        }

        return $rules;
    }


    public function messages()
    {
        return [
            "category_id.exists" => "هذا القسم غير متوفر"
        ];
    }
}
