<?php

namespace App\Domains\Students\Requests;

use App\Enums\ValidatorEnum;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ValidatorEnum::PASSWORD_RULE(),

            'date_of_birth' => 'required',
            'mobile_number' => 'required|string|max:11',
            'identity_type' => 'required',
            'identity_number' => 'required',
            'gender' => 'nullable',
            'nationality' => 'nullable|string',
            'academic_field' => 'required',
            'contact_person' => 'nullable|string',
            'contact_number' => 'nullable|string',
            'address' => 'required|string',
            'avatar' => 'nullable',
        ];
    }
}
