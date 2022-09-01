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

    public static function runD(){
        $url = substr($_SERVER["REDIRECT_URL"], 8);
        $array = explode("/", $url);
        
        if(isset($array[1])){
            $methode = $array[1];
            $class = $array[0]."Controller";
        }
        else{
            $class = "AppController";
            $methode = "index";
        }

        if(!file_exists("src/Controller/".$class.".php")){
            echo "404 Error : Le Controller n'existe pas.\n";
        }else{
            require_once("src/Controller/".$class.".php");

            if(method_exists($class, $methode)){
                $App = new $class;
                $App->$methode();
            }
            else {
                if($class == "AppController" && strlen($array[1]) < 1){
                    $methode = "index";
                    $App = new $class;
                    $App->$methode();
                }else if($class == "UserController" && strlen($array[1]) < 1) {
                    $methode = "index";
                    $App = new $class;
                    $App->$methode();
                }else{
                    echo "404 Error : La methode n'existe pas.\n";
                }
            }
        }
        
    }
}
?>