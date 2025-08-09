<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class AuthRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $routeName = $this->route()->getName();
        return match($routeName){
            'auth.login' => $this->getAuthRules(),
            'auth.register' => $this->getRegisterRules(),
            'auth.update' => $this->getUpdateRules(),
            default => [],
        };
    }

    private function getAuthRules(): array{
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ];
    }

    private function getRegisterRules(){
        return [
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'confirmed', 'max:100', Password::min(8)->mixedCase()->numbers()],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string'],
            'birth_date' => ['required', 'date', 'before:today'],
            'contact_num' =>  ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
        ];
    }

    private function getUpdateRules(){
        return [
            'email' => ['required', 'email'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string'],
            'birth_date' => ['required', 'date', 'before:today'],
            'contact_num' =>  ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
        ];
    }
}
