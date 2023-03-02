<?php

namespace App\Domains\Instructors\Requests;

use App\Data\Models\Instructor;
use App\Enums\ValidatorEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateInstructorRequest extends FormRequest
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
        $instructor = Instructor::whereId($this->instructor)->first();

        return [
            'name' => ['required', 'string', 'max:50'],
            'email' => 'string|required|unique:users,email,'.$instructor->user_id,
            'password' => ValidatorEnum::PASSWORD_RULE(),

            'date_of_birth' => 'required',
            'mobile_number' => 'string|required|max:11|min:11|unique:instructors,mobile_number,'.$this->instructor,
            'identity_type' => 'required',
            'identity_number' => 'required|unique:instructors,identity_number,'.$this->instructor,
            'gender' => 'nullable',
            'speciality' => 'required|string',
            'address' => 'required|string',
            'avatar' => 'nullable',
        ];
    }
}
