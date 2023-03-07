<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = ['id'];

    public static function getByName($name, $default = null)
    {
        $setting = self::where('name', $name)->first();
        if (isset($setting)) {
            return $setting->value;
        }else{
            return $default;
        }
    }
}
