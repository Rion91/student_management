<?php

namespace App\Domains\Students\Requests;

use App\Enums\ValidatorEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'email' => 'string|required|email',
            'password' => ValidatorEnum::PASSWORD_RULE(),

            'date_of_birth' => 'required',
            'mobile_number' => 'string|required|max:11|min:11',
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
