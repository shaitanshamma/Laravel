<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2'],
            'description' => ['required', 'string'],
            'img' => ['nullable', 'file', 'image', 'mimes:jpg,png'],
            'source' => ['required', 'string'],
            'author_id' => ['required', 'int'],
            'status' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'Необходимо заполнить поле :attribute.'
        ];
    }

    public function  attributes(): array
    {
        return [
            'title' => 'название новости',
            'description' => 'описание новости',
            'img' => 'путь до изображения',
            'category_id' => 'категории',
            'source' => 'источника новости',
            'author_id' => 'автора новости',
            'status' => 'статус новости',
        ];
    }
}
