<?php

namespace App\Helpers;

use App\Data\Models\File;

class imageSave
{
    public static function avatarSave($model, $image): File
    {
        if ($image) {
            if ($model->avatar) {
                $model->avatar->delete();
            }
        }

        return $model->avatar = (new File)->fromPost($image);
    }
}
