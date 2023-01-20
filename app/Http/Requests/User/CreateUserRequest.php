<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|max:255|confirmed',
            'phone' => 'required|string|celular_com_ddd|max:255',
            'cpf' => 'required|cpf',
            'state' => 'required|string|uf',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'postal_code' => 'required|formato_cep'
        ];
    }
}
