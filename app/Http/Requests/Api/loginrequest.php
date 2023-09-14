<?php

namespace App\Http\Requests\Api;

use App\Requests\BaseRequsetFormApi;
use Illuminate\Foundation\Http\FormRequest;

class loginrequest extends BaseRequsetFormApi
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
            'email'=>'require|min:5|email|unique:users,email',
            'passwoed'=>'require|min:5|max:50,confirmed',
        ];
    }
}
