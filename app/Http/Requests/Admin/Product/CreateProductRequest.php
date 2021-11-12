<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
    public function rules($datasource, $data)
    {
        $model = new $datasource;
        $rules = [];

        foreach ($model->getFillable() as $value) {

            if ($value != 'image_url') {
                $rules[$value] = "required";
            }
            
        }

        if ($data["is_child"] == 1) {
            unset($rules['image']);
        } else {
            unset($rules['parent_product_id']);
        }

        return $rules;
    }


    /**
     * Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [];
    }
}
