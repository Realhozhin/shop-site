<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
        if ($this->getMethod() == 'POST') {
            return [
                'category_id'=>'required',
                'name'=>'required',
                'slug'=>'required',
                'brand'=>'required',
                'image'=>'required',
                'smallDescription'=>'required',
                'description'=>'required',
                'originalPrice'=>'required',
                'sellingPrice'=>'required',
                'quantity'=>'required',
                'metaTitle'=>'required',
                'metaKeywords'=>'required',
                'metaDescription'=>'required',
            ];
        } else {
            return [
                'category_id'=>'required',
                'name'=>'required',
                'slug'=>'required',
                'brand'=>'required',
                'image'=>'nullable',
                'smallDescription'=>'required',
                'description'=>'required',
                'originalPrice'=>'required',
                'sellingPrice'=>'required',
                'quantity'=>'required',
                'metaTitle'=>'required',
                'metaKeywords'=>'required',
                'metaDescription'=>'required',
            ];
        }

    }
}
