<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProduct extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $product = $this->route('product');
        return $product && $this->user()->can('update', $product);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => [
                'required',
                'string',
                Rule::unique('products')->ignore($this->route('product')->id),
            ],
            'code' => 'required|integer',
            'price' => 'required|integer',
            'amount' => 'required|integer'
        ];
    }
}
