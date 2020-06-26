<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class insert_newscondition extends FormRequest
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
            'News_titre'=>'min:10|max:255',
            'news_description'=>'min:50|max:100000'
        ];
    }
}
