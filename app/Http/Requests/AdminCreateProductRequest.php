<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCreateProductRequest extends FormRequest
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
        return [
            "name" => ['required', 'min:2', 'max:500', 'string'],
            "description" => ['nullable', 'string', 'max:1500'],
            "amount" => ['required', 'min:0', 'integer'],
            "price" => ['required', 'min:0.01', 'numeric'],
            "product_image" => ['file', 'mimes:jpg,bmp,png', 'nullable', 'dimensions:min_width=300,min_height=300']
        ];
    }
}
