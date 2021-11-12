<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateArticleRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules($id)
    {

        return [
            'keywords'  => ['required'],
            'content'  => ['required'],
            'title' => [
                'required',
                Rule::unique('articles', 'title')->ignore($id),
            ],
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
