<?php

namespace App\Traits;

use Illuminate\Support\Facades\Hash;

trait BcryptPassword
{
    public static function bootBcryptPassword()
    {
        static::creating(function ($model) {
            $model->password = Hash::make($model->password);
        });

        static::updated(function ($model) {
            if (!empty($model->password)) {
                $model->password = Hash::make($model->password);
            }
        });
    }
}
