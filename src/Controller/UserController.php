<?php
require_once("Core/Controller.php");
class UserController extends \Core\Controller {

    public static function User() {
        require_once("src/Model/UserModel.php");
        $userModel = new UserModel();
        $userModel->Connect();
    }

    function add () {
        $this->render('register');
    }

    public static function index(){
        echo "User => Index()";
    }

}

?>