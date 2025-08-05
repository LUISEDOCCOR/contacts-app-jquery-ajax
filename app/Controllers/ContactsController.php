<?php
namespace App\Controllers;
use App\Core\View;
use App\Core\Flash;
use App\Models\ContactModel;

class ContactsController
{
    public function index()
    {
        $contacts = ContactModel::getAllMin();
        View::render("contacts/index.php", null, [
            "contacts" => $contacts,
        ]);
    }
    public function create()
    {
        $name = $_POST["contact_name"] ?? "";
        $number = $_POST["contact_number"] ?? "";
        $notes = $_POST["contact_notes"] ?? "";

        if (!empty($name) and !empty($number) and !empty($notes)) {
            if (ContactModel::create($name, $number, $notes) == 0) {
                Flash::Error("Hubo un error al crearlo");
            } else {
                Flash::Success("Creado correctamente");
            }
        } else {
            Flash::Error("Todos los campos son necesarios");
        }
        header("Location: /");
        exit();
    }
    public function delete()
    {
        $id = $_GET["id"] ?? "";

        if (empty($id)) {
            Flash::Error("EL id en necesario");
        } else {
            if (ContactModel::delete($id) == 0) {
                Flash::Error("No se borro ningún elemento");
            } else {
                Flash::Success("Borrado correctamente");
            }
        }
        header("Location: /");
        exit();
    }
    public function getOne()
    {
        $id = $_GET["id"] ?? "";
        header("Content-Type: application/json");
        if (empty($id)) {
            echo json_encode(["msg" => "El id es necesario"]);
        } else {
            echo json_encode(ContactModel::getByID($id));
        }
    }
    public static function edit()
    {
        $name = $_POST["contact_name"] ?? "";
        $number = $_POST["contact_number"] ?? "";
        $notes = $_POST["contact_notes"] ?? "";
        $id = $_POST["edit_contact_id"] ?? "";

        if (!empty($name) and !empty($number) and !empty($notes)) {
            if (ContactModel::update($id, $name, $number, $notes) == 0) {
                Flash::Error("No se modifico ningún elemento");
            } else {
                Flash::Success("Editado correctamente");
            }
        } else {
            Flash::Error("Todos los campos son necesarios");
        }
        echo json_encode($_POST);
        header("Location: /");
        exit();
    }
}
