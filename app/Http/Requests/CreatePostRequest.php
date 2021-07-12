<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'body' => 'required',
            'category_name' => 'required',
            'photo' => 'mimes:jpeg,jpg,png'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute обязательное поле для заполнения',
            'mimes' => ':attribute должно быть в формате jpeg, jpg, png'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '"Заголовок"',
            'body' => '"Тело поста"',
            'category_name' => '"Категория"',
            'photo' => '"Фото"'
        ];
    }
}
