<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerJobRequest extends FormRequest
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
            'job_type' => 'string|required',
            'start_date' => 'date|required',
            'completion_date' => 'date|nullable',
            'quantity' => 'integer|required',
            'unit_price' => 'decimal:2|required',
            'extras' => 'string|nullable',
        ];
    }
}
