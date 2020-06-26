<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerConditions extends FormRequest
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
            'prenom'=>'required|min:3|max:15|alpha',
            'nom'=>'required|min:3|max:15|alpha',
            'email'=>'required|min:5|max:50',
            'city'=>'required|min:3|max:15|alpha',
            'phone'=>'required|min:10|max:15',
            'password1'=>'required|min:7|max:25',
            'password2'=>'required|min:7|max:25'
        ];
    }
}
