<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserExperienceRequest extends FormRequest
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
            'name' => 'required',
            'company' => 'required',
            'opportunity_job_id' => 'required|integer',
            'initial_date' => 'required|date',
            'final_date' => 'sometimes|date|after:initial_date',
            'current_work' => 'sometimes|required_if:final_date, null',
            'details' => 'sometimes|string'
        ];
    }
}
