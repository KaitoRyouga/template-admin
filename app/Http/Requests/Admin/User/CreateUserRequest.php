<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class CreateUserRequest extends FormRequest
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

            if ($value == 'email') {

                $rules[$value] = "required|email";
            } else {

                $rules[$value] = "required";
            }
            
        }

        return $rules;
    }

    /**
     * Attributes of form request
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'  => 'Tên tài khoản admin',
            'email' => 'Email đăng nhập',
            'role' => 'Quyền'
        ];
    }
}
