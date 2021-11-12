<?php

namespace App\Http\Requests\Client\Pay;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreatePayRequest extends FormRequest
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
            'input' => 'required',
            'phone' => ['regex:/^[0-9\s]*$/i', 'nullable'],
            'note' => ['regex:/^[a-z0-9\s]*$/i', 'nullable']
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
        ];
    }
}
