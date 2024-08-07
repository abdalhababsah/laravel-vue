<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        // Change this to true if you want to allow all users
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published' => 'required|boolean',
            'inStock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image validation rules if needed
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'product title',
            'description' => 'product description',
            'published' => 'published status',
            'inStock' => 'stock quantity',
            'price' => 'product price',
            'brand_id' => 'brand',
            'category_id' => 'category',
            'images.*' => 'product images',
        ];
    }
}
