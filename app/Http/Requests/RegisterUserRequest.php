<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
           
                'name' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'email' => [
                    'required', 
                    'string', 
                    'email', 
                    'max:100', 
                    'unique:users',
                    'regex:/^[^@]+@[^@]+\.com$/' // Validación de dominio .com
                ],
                'password' => ['required', 'confirmed', Password::defaults()]
            
        ];
    }
    public function messages()
    {
        return [
            'email.regex' => 'Solo se permiten correos electrónicos con dominio .com'
        ];
    }
}
