<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Categoryrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'image'=>'required|mimes:jpg,png|image',
            'status'=>'nullable',
            'metaTitle'=>'required',
            'metaKeywords'=>'required',
            'metaDescription'=>'required',
        ];
    }
}
