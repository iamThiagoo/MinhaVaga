<?php

namespace App\Http\Requests\User;

use App\Enums\Idiom;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserIdiomRequest extends FormRequest
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
            'idiom_id' => 'required|integer',
            'fluency'  => ['required', Rule::in('A', 'B', 'F', 'I')]
        ];
    }
}
