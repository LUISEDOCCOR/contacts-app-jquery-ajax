<?php
namespace App\Models;
use App\Models\BaseModel;

class ContactModel extends BaseModel
{
    public static function create($name, $number, $notes)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare(
            "INSERT INTO contacts (name, number, notes) VALUES (?,?,?)",
        );
        $stmt->bind_param("sss", $name, $number, $notes);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public static function getAllMin()
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare("SELECT id, name, number FROM contacts");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function delete($id)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare("DELETE FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }

    public static function getByID($id)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public static function update($id, $name, $number, $notes)
    {
        $conn = self::connectDB();
        $stmt = $conn->prepare(
            "UPDATE contacts SET name = ?, number = ?, notes = ? WHERE id = ?",
        );
        $stmt->bind_param("sssi", $name, $number, $notes, $id);
        $stmt->execute();
        return $stmt->affected_rows;
    }
}
