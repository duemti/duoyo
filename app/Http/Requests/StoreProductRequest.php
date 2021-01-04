<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
			'name' => ['required', 'unique:products,name'],
			'description' => 'required',
			'type' => ['required', 'in:men,women,kids'],
			'category' => ['required'],
			'sizes.*' => ['required', 'in:XS,S,M,L,XL,XXL'],
			'images' => ['required', 'image'],
			'price' => ['required', 'numeric']
        ];
    }
}
