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
        $student = Student::whereId($this->student)->first();

        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => 'string|required|unique:users,email,'.$student->user_id,
            'password' => ValidatorEnum::PASSWORD_RULE(),

            'date_of_birth' => 'required',
            'mobile_number' => 'string|required|max:11|min:11|unique:students,mobile_number,'.$this->student,
            'identity_type' => 'required',
            'identity_number' => 'required|unique:students,identity_number,'.$this->student,
            'gender' => 'nullable',
            'nationality' => 'nullable|string',
            'academic_field' => 'required',
            'contact_person' => 'nullable|string',
            'contact_number' => 'nullable|string|unique:students,contact_number,'.$this->student,
            'address' => 'required|string',
            'avatar' => 'nullable',
        ];
    }
}
