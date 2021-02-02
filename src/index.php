<?php
//General session
session_start();
if(isset($_GET["admin"]) && $_GET["admin"] === 'panel'){
    //Admin access
    include_once('./view/backend/index.php');
}else{
    //Public access
    include_once('./view/public/index.template.php');
}
