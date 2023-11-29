<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageStoreRequest extends FormRequest
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
            'name' => ['required','unique:packages'],
            'range_from' => ['required'],
            'range_to' => ['required'],
            'quantity' => ['required','integer','between:1,100000'],
            'discount_percentage' => ['required','integer','between:1,100'],
        ];
    }
}
