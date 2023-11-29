<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuthRequest extends FormRequest
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
        $validate = [
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'user_type'=>'required',
            'password'=>'required|min:5|max:12',
            'confirm_password'=>'required|min:5|max:12|same:password'
        ];

        if(request()->user_type === 'installer') {
            $validate['registration_number'] = 'required|min:5|max:20';
        }

        return $validate;
    }
}
