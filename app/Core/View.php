<?php
namespace App\Core;

class View
{
    public static function render(
        $view,
        $layout = "main_layout.php",
        $vars = [],
    ) {
        if ($layout == null) {
            $layout = "main_layout.php";
        }

        extract($vars);

        //contenido de mi view
        ob_start();
        require_once VIEWS_DIRECTORY . "/$view";
        $content = ob_get_clean();

        require_once VIEWS_DIRECTORY . "/header.php";
        require_once VIEWS_DIRECTORY . "/layouts/$layout";
        require_once VIEWS_DIRECTORY . "/footer.php";
    }
}
