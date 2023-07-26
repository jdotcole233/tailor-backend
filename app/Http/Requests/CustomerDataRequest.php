<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerDataRequest extends FormRequest
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
            'customer_first_name' => 'string|required|max:100',
            'customer_last_name' => 'string|required|max:100',
            'customer_primary_phone_number' => 'string|required|max:24|unique:customers,customer_primary_phone_number',
            'customer_secondary_phone_number' => 'string|nullable|max:24|unique:customers,customer_secondary_phone_number',
            'dob' => 'date|nullable',
            'gender' => 'string|required'
        ];
    }
}
