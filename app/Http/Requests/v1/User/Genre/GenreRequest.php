<?php

namespace App\Http\Requests\v1\User\Genre;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('genre_id')]);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:genres,id'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Genre not found or is deleted!',
        ];
    }
}
