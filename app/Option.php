<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'key', 'name',
    ];

    public static function get($key, $default = '')
    {
        $option = Option::where('key', $key)->first();
        return $option ? $option->value : $default;
    }

    public static function set($key, $value)
    {
        $option = Option::firstOrCreate(['key' => $key]);
        $option->value = $value;

        if ($option->save()) {
            return true;
        } else {
            return false;
        }
    }
}
