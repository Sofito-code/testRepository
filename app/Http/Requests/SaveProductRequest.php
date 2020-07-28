<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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


    public function rules()
    {
        return [
            'title' => 'required',
            'URL' => 'required',
            'description' => 'required',
            'price' => 'required'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'El producto necesita un titulo',
            'URL.required' => 'El producto necesita un URL',
        ];
    }
}
