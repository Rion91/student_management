<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPER_ADMIN = 'super-admin';

    case STUDENT = 'student';

    case INSTRUCTOR = 'instructor';
}
