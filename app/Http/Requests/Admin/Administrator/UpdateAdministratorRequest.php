<?php

namespace App\Http\Requests\Admin\Administrator;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UpdateAdministratorRequest extends FormRequest
{
    private $email;

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
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {

        $data = Role::pluck("id")->toArray();

        return [
            'name' => ['required'],
            'email' => [
                'required',
                'email',
                Rule::unique('administrators', 'email')->ignore($id),
                'max:255'
            ],
            'role' => ['required', Rule::in($data)]
        ];
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
