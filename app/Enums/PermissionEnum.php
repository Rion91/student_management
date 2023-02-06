<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case INDEX_APPLICATION_SERVICE = 'index-application-services';
    case SHOW_APPLICATION_SERVICE = 'show-application-services';
    case UPDATE_APPLICATION_SERVICE = 'update-application-services';

    case INDEX_STUDENT = 'index-student';
    case SHOW_STUDENT = 'show-student';
    case UPDATE_STUDENT = 'update-student';
    case DELETE_STUDENT = 'delete-student';
}
