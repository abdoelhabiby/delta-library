<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            "name" => "required|unique:categories,name|max:150",
            "active" => "required|in:0,1"
        ];

        if(in_array($this->getMethod(),['PUT','PATCH'])){
            $rules['name'] = "required|" . Rule::unique("categories","name")->ignore($this->category);
        }

        return $rules;
    }
}
