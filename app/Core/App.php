<?php
namespace App\Core;
use App\Controllers\ContactsController;

class App
{
    private $router;

    public function __construct()
    {
        $this->router = new Router();

        #Inicio
        $this->router->get("/", ContactsController::class, "index");
        #Obtener un contacto API
        $this->router->get("/api/contact", ContactsController::class, "getOne");
        #Crear contacto
        $this->router->post(
            "/contact/create",
            ContactsController::class,
            "create",
        );
        #Borrar contacto
        $this->router->get(
            "/contact/delete",
            ContactsController::class,
            "delete",
        );
        #Editar contacto
        $this->router->post("/contact/edit", ContactsController::class, "edit");
    }

    public function run()
    {
        $this->router->dispatch(
            $_SERVER["REQUEST_METHOD"],
            $_SERVER["REQUEST_URI"],
        );
    }
}
