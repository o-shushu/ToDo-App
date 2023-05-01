<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                Rule::exists('users', 'email'),
            ],
        ];
    }
    
    public function attributes()
    {
        return [
            'email' => 'メールアドレス',
        ];
    }

    public function messages()
    {
        return [
            'email.exists' => 'メールアドレスは存在していません。',
            'email.email' => 'メールアドレスは正しくではありません。',
        ];
    }
}
