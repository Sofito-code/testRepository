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
            'title' => 'required|min:3|max:50|',
            'URL' => 'required|min:3|max:50|',
            'description' => 'required|min:10|max:100|',
            'price' => 'required|min:3|max:6|',
            'image' => 'required'
        ];
    }

    public function message()
    {
        return [
            'title.required' => 'El producto necesita un titulo',
            'URL.required' => 'El producto necesita un URL',
            'description.required' => 'El producto necesita una descripcion',
            'price.required' => 'El producto necesita un precio',
            'image.required' => 'El producto necesita una foto',
        ];
    }
}
