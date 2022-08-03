<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait UuidPrimary
{
    public static function bootUuidPrimary()
    {
        static::creating(function ($model) {
            $model->id = Str::uuid();
        });
    }
}
