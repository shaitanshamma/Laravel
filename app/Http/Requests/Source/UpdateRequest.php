<?php

namespace App\Http\Requests\Source;

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
            'path' => ['required', 'url'],
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
            'title' => 'название источника',
            'path' => 'путь до источника',
        ];
    }
}
