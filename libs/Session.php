<?php

class Session {
    public static function init()
    {
        session_start();
    }

    public static function set($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if(isset($_SESSION[$key]))
        return $_SESSION[$key];
    }

    public static function unset($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public static function append($key,$value) {
        array_push($_SESSION[$key],$value);
    }

    public static function destroy()
    {
        unset($_SESSION);
        session_destroy();
    }

    public static function status()
    {
        return session_status();
    }
}