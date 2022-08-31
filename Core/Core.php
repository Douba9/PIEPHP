<?php
namespace Core;
use UserController;
class Core
{
    public function run()
    {
        require_once(implode(DIRECTORY_SEPARATOR, ['src', 'routes.php']));
        require_once("Core/Router.php");
        
        $url = substr($_SERVER["REDIRECT_URL"], 7);
        $array = Router::get($url);
        $class = $array["controller"]."Controller";
        require_once("src/Controller/".$class.".php");
        $methode = $array["action"];
        $App = new $class;
        $App->$methode();
    }
}
?>