<?php
namespace App\Core;

class Flash
{
    public static function Error($msg)
    {
        unset($_SESSION["error"]);
        $_SESSION["error"] = $msg;
    }
    public static function Success($msg)
    {
        unset($_SESSION["success"]);
        $_SESSION["success"] = $msg;
    }
}
