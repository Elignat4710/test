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
            'title' => 'required|max:50',
            'body' => 'required|max:500',
            'category_name' => 'required|max:50',
            'photo' => 'mimes:jpeg,jpg,png',
            'tags' => 'required|max:5'
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute обязательное поле для заполнения',
            'mimes' => ':attribute должно быть в формате jpeg, jpg, png',
            'max' => 'Поле ":attribute" должно быть не больше :max'
        ];
    }

    public function attributes()
    {
        return [
            'title' => '"Заголовок"',
            'body' => '"Тело поста"',
            'category_name' => '"Категория"',
            'photo' => '"Фото"',
            'tags' => '"Теги"'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tags' => $this->request->get('tags') == null ? null : explode(',', $this->request->get('tags'))
        ]);
    }
}
