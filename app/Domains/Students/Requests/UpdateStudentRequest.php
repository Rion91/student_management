<?php

namespace App\Domains\Students\Requests;

use App\Data\Models\Student;
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
        $userId = Student::where('id', $this->id)->first();

        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => 'string|required|email|unique:users,email,'.$userId->user_id,
            'password' => ValidatorEnum::PASSWORD_RULE(),

            'date_of_birth' => 'required',
            'mobile_number' => 'string|required|max:11|min:11|mobile_number|unique:students,mobile_number,'.$this->id,
            'identity_type' => 'required',
            'identity_number' => 'required|identity_number|unique:students,identity_number'.$this->id,
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
