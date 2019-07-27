<?php

class Cookie {
    public static function set($key,$value){
        setcookie($key,$value,time()+CONFIG_MAIN_COOKIE_EXPIRE_TIME);
    }

    public static function get($key){
        return isset($_COOKIE[$key]) ? $_COOKIE[$key] : false;
    }

    public static function destroy($key){
        if(isset($_COOKIE[$key])) {
            unset($_COOKIE[$key]);
            return true;
        }
        return false;
    }
}