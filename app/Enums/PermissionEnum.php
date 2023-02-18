<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case INDEX_APPLICATION_SERVICE = 'index-application-services';
    case SHOW_APPLICATION_SERVICE = 'show-application-services';
    case UPDATE_APPLICATION_SERVICE = 'update-application-services';

    case INDEX_STUDENT = 'index-student';
    case SHOW_STUDENT = 'detail-student';
    case UPDATE_STUDENT = 'update-student';
    case DELETE_STUDENT = 'delete-student';

    case INDEX_USER = 'index-user';
    case CREATE_USER = 'create-user';
    case SHOW_USER = 'detail-user';
    case UPDATE_USER = 'update-user';
    case DELETE_USER = 'delete-user';

    case INDEX_INSTRUCTOR = 'index-instructor';
    case CREATE_INSTRUCTOR = 'create-instructor';
    case SHOW_INSTRUCTOR = 'detail-instructor';
    case UPDATE_INSTRUCTOR = 'update-instructor';
    case DELETE_INSTRUCTOR = 'delete-instructor';
}
