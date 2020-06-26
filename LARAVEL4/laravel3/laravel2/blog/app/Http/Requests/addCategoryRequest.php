<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addCategoryRequest extends FormRequest
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
            'category_nom'=>'required|min:3|max:25|alpha',
            'category_description'=>'min:7|max:10000    '
        ];
    }
}
