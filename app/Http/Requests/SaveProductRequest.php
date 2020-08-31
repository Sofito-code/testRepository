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
            'title' => 'required|min:3|max:50',
            'slug' => 'required|min:3|max:50',
            'description' => 'required|min:10|max:100',
            'price' => 'required|min:3|max:10|',
            'image' => 'file',
            'category_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'main_slider' => 'required|in:ye,no'

        ];
    }

    public function message()
    {
        return [
            'title.required' => 'El producto necesita un titulo',
            'slug.required' => 'El producto necesita un slug',
            'description.required' => 'El producto necesita una descripcion',
            'price.required' => 'El producto necesita un precio',
            'category_id' => 'El producto necesita una categoria',
            'quantity' => 'El producto necesita una cantidad',
        ];
    }
}
