<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'sometimes|string',
            'description' => 'sometimes|string',
            'image_url' => 'array|min: 1',
            'image_url.*' => ['sometimes', 'regex:/^(https?:)?\/\/?[^\'"<>]+?\.(jpg|jpeg|png)(.*)?$/'],
            'genre' => 'sometimes|string',
        ];
    }
}
