<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            // 'category_id' => 'required',
            // 'sub_category_id' => 'required',
            // 'sub_sub_category_id' => 'required',
            // 'size_id'              => 'required',
            // 'color_id'             => 'required',
            // 'product_name_lang1'   => 'required',
            // 'product_name_lang2'   => 'required',
            // 'market_price'   => 'required',
            // 'quantity'   => 'required',
            // 'product_code'   => 'required',
            // 'details_lang1'   => 'required',
            // 'details_lang2'   => 'required',
            // 'path[]'   => 'required',
            // 'caption[]'   => 'required',
        ];
    }
}
