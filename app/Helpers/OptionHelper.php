<?php

if(!function_exists('')){
    function option($key, $default='') {
        return App\Option::get($key, $default);
    }
}