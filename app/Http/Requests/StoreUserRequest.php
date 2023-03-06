<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^\S*\s+\S*$/', # Regular expression for string to contain at least one space
            'birthday' => 'required|date',
            'email' => 'required|email:rfc,dns|unique:users',
            'cpf'=> 'required|regex:/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/|unique:users', # Regular expression for string to be in CPF format
            'phone' => 'required|regex:/^\(\d{2}\)\s\d{5}\-\d{4}$/', # Regular expression for string to be in phone format
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'password' => 'required|confirmed'
        ];
    }
}
