<?php
namespace App\Models;

use mysqli;

abstract class BaseModel
{
    protected static function connectDB()
    {
        $conn = new mysqli("localhost", "root", "12345678", "contacts_app_v");
        return $conn;
    }
}
