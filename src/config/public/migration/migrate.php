<?php
require_once('../../database/database.php');
require_once('../../../model/model.php');

$arrload = [];
//-------------
$cacheData = require_once('../../cache/database.php');

$connectDB = new DBManage;

if($cacheData['database'] || $cacheData['table']){
    if($cacheData['database']){
        $query = require_once('./data/database.php');
        $connectDB->sqlQuery($query);
    }
    
    if($cacheData['table']){
        $files = array_diff(scandir('./data'), array('.', '..', 'database.php'));
    
        foreach ($files as $value) {
            array_push($arrload, require_once('./data/'.$value));
        }
    
        foreach ($arrload as $query) {
            $connectDB->sqlQuery($query);
        }
    }
}else{
    header('Location: ./');
}