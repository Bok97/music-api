<?php

namespace App\Http\Requests\v1\User\Song;

use Illuminate\Foundation\Http\FormRequest;

class SongRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge(['id' => $this->route('song_id')]);
    }

    public function rules()
    {
        return [
            'id' => ['required', 'exists:songs,id'],
        ];
    }

    public function messages()
    {
        return [
            'id.exists' => 'Song not found or is deleted!',
        ];
    }
}
