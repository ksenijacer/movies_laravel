<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'require|email|unique',
            'password' => 'required|string',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function passwordConfirmation() {
        return ['password_confirmation|same' => 'Your passwords do not match.'];
    }
}
