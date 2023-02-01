<?php

namespace App\Enums;

enum REGEXEnum: string
{
    case COUNTRY_CODE = '/^\+(?:[0-9]{1,3} ?)$/';

    case MOBILE_NUMBER = '/^\\+?[1-9][0-9]{6,11}$/';
}
