<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'category_name_lang1' => 'required|unique:categories','category_name_lang1',
            'category_name_lang2' => 'required',
             //'featured_image'     => 'required',
            // 'icon'                => 'required',     
        ];
    }
}
