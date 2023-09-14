<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'Product_name'=>'required',
            'section_id'=>'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'section_name.required'=>'عفوا يرجى ادخال اسم المنتج',
            'section_id.required'=>'عفوا يرجى ادخال اسم القسم',
            'description.required'=>'يرجى كتابة الملاحظات',
        ];
    }
}
