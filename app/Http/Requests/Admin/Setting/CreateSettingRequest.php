<?php

namespace App\Http\Requests\Admin\Setting;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateSettingRequest extends FormRequest
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
            'setting_key' => 'required',
            'setting_value' => 'required',
            'type' => ['required', Rule::in(Setting::INPUT_TEXT, Setting::INPUT_TEXTAREA, Setting::INPUT_MEDIA)]
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
