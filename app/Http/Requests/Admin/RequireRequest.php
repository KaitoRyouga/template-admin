<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RequireRequest extends FormRequest
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
    public function rules($datasource)
    {
        $model = new $datasource;
        $rules = [];

        foreach ($model->getFillable() as $key => $value) {

            if ($value != 'image_url') {
                $rules[$value] = "required";
            }
            
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
