<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUpdateUserRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return
            [
                'name' => ['required', 'string', 'max:255'],
                'surname' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)],
                'phone_number' => ['required', 'string', 'max:30']
            ];
    }

}
