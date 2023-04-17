<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserCertificateRequest extends FormRequest
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
            'name' => 'required|string',
            'institution_id' => 'required|integer',
            'initial_date' => 'required|date',
            'final_date' => 'sometimes|date|gt:initial_date',
            'no_expired' => 'sometimes',
            'code_certificate' => 'sometimes',
            'url_certificate' => 'sometimes'
        ];
    }
}
