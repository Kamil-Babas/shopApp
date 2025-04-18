<?php

namespace App\Http\Requests;

use App\Models\ProductCategory;
use Illuminate\Foundation\Http\FormRequest;

class AdminUpdateProductRequest extends FormRequest
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
        $productCategories = ProductCategory::pluck('id')->toArray();
        $productCategories = implode(",", $productCategories);

        return [
            "name" => ['required', 'min:2', 'max:500', 'string'],
            "description" => ['nullable', 'string', 'max:1500'],
            "amount" => ['required', 'min:0', 'integer'],
            "price" => ['required', 'min:0.01', 'numeric', 'between:0, 999999.99'],
            "product_image" => ['image', 'mimes:jpg,bmp,png', 'nullable', 'dimensions:min_width=300,min_height=300'],
            "category_id" => ['required', 'integer', 'in:' . $productCategories]
        ];
    }
}
