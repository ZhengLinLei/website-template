<?php
if(!isset($_SESSION["config"]["backend"]) || empty($_SESSION["config"]["backend"])){
    $_SESSION["config"]["backend"] = require_once('./config/cache/backend.php');
}
//LogIn
if(isset($_POST["login"]) && !empty($_POST["actionCode"]) && $_POST["actionCode"] == $_SESSION["backend_action_code"]){
    // Code for get user from database
    if(false /* chenck if the user is in the admin user database */){

    }else{
        $num = array_search($_POST["userAdmin"], $_SESSION["config"]["backend"]["admin"]["user"]);
        if($num > -1 && $_POST["passwordAdmin"] === $_SESSION["config"]["backend"]["admin"]["password"][$num]){
            $_SESSION["admin"] = ["data" => ["login" => true, "user" => $_POST["userAdmin"], "password" => $_POST["passwordAdmin"]]];
        }else{
            $_SESSION["error_public"]["login"]["backend"] = ["error" => true, "user" => $_POST["userAdmin"]];
        }
    }
}
//Start including templates
if(isset($_SESSION["admin"]) && $_SESSION["admin"]["data"]["login"]){
    if(isset($_GET["type"]) && !empty($_GET["type"])){
        include_once('./view/backend/import/plugin/index.template.php');
    }else{
        include_once('./view/backend/import/index.php');
    }
}else{
    include_once('./view/backend/import/login.php');
}