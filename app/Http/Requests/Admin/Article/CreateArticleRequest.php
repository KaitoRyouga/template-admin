<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateArticleRequest extends FormRequest
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
            'title'      => ['required', Rule::unique('articles', 'title')],
            'keywords'  => ['required'],
            'content'  => ['required']
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

        ];
    }
}
