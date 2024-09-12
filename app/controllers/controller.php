<?php
abstract class Controller
{
    // add footer and header and navbar
    public function __construct()
    {
    }

    function displayView($model)
    {
        $directory = strtolower(substr(get_class($this), 0, -10));
        $view = debug_backtrace()[1]['function'];
        require __DIR__ . "/../views/$directory/$view.php";
    }

    function displayPageView($view)
    {
        $directory = strtolower(substr(get_class($this), 0, -10));
        require __DIR__ . "/../views/$directory/$view.php";
    }

    function displayPageViewWithModel($view, $model)
    {
        require "/app/views/$view.php";
    }

    // since festival files are inside a folder, the path is different.
    //to do: display festival pages too



    // to do: add footer and header and nav bar

    protected function sanitizeInput($input)
    {
        return htmlspecialchars($input);
    }

    protected function logoutUser(): void
    {
        unset($_SESSION["loggedUser"]);
        header("location: /auth/login");
        die();
    }

    protected function display404PageNotFound(): void
    {
        require_once __DIR__ . '/../views/PageNotFound.html';
    }

    protected function displayFooter(): void
    {
        require_once __DIR__ . '/../views/Footer.php';
    }

}

