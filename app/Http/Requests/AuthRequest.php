<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'gender' => ['required', 'in:male,female,other'],
            'address' => ['required', 'string'],
            'birth_date' => ['required', 'date', 'before:today'],
            'contact_num' =>  ['required', 'string', 'regex:/^[0-9]{10,15}$/'],
        ]
    }
}
