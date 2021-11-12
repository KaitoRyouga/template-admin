<?php

namespace App\Http\Requests\Admin\Role;

use App\Rules\OrderRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchRoleRequest extends FormRequest
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
            'name'      => ['nullable'],
            'order_by'  => ['nullable', Rule::in(['roles.id', 'roles.name', 'roles.created_at'])],
            'order'     => ['nullable', new OrderRule()],
            'limit'     => ['nullable', 'integer', 'min:10', 'max:100']
        ];
    }

    /**
     * Attributes
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'name'          => 'Tên nhóm quyền',
            'order_by'      => 'Điều kiện sắp xếp',
            'order'         => 'Điều kiện sắp xếp',
            'limit'         => 'Số bản ghi'
        ];
    }
}
