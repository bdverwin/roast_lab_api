<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product.update', 'product.create' => $this->getProductRules(),
            default => [],
        };
    }

    public function getProductRules(){
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'stock' => ['required', 'integer'],
            'image' => ['required', 'string'],
        ];
    }

    
}
