<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyDataRequest extends FormRequest
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
            'company_name' => 'string|required',
            'address_street' => 'string|nullable',
            'suburb' => 'string|required',
            'region' => 'string|required',
            'country' => 'string|required',
            'company_logo' => 'nullable',
            'social_media_handles' => 'string|nullable',
            'primary_phone_number' => 'string|required|max:24|unique:companies,primary_phone_number',
            'secondary_phone_number' => 'string|nullable|unique:companies,secondary_phone_number',
            'owner_first_name' => 'string|required',
            'owner_last_name' => 'string|required',
            'owner_primary_phone_number' => 'string|required|max:24|unique:owners,owner_primary_phone_number',
            'owner_secondary_phone_number' => 'string|nullable|max:24|unique:owners,owner_secondary_phone_number',
            'password' => 'string|required|confirmed' 
        ];
    }
}
