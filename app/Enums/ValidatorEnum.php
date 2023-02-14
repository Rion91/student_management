<?php

namespace App\Enums;

use Illuminate\Validation\Rules\Password;

enum ValidatorEnum: string
{
    public static function PASSWORD_RULE(): array
    {
        return [
            'required', 'string', 'min:6',
            // 'confirmed',
            //Password::min(8)->mixedCase()
        ];
    }

    case IMAGE = 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:20480';
    case DOCUMENT = 'file|mimes:ppt,pptx,doc,docx,pdf,xls,xlsx|max:204800';

    public static function COUNTRY_CODE(): array
    {
        return ['required', 'regex:'.REGEXEnum::COUNTRY_CODE->value, 'max:6'];
    }

    public static function MOBILE_NUMBER($unique = false, $userId = false): array
    {
        if ($unique) {
            if ($userId) {
                return ['required', 'regex:'.REGEXEnum::MOBILE_NUMBER->value, 'max:11', 'unique:users,mobile_number,'.$userId];
            }

            return ['required', 'regex:'.REGEXEnum::MOBILE_NUMBER->value, 'max:11', 'unique:users'];
        } else {
            return ['required', 'regex:'.REGEXEnum::MOBILE_NUMBER->value, 'max:11'];
        }
    }
}
