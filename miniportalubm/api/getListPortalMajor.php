<?php
    header('Content-Type: application/json');

    require_once('../action/get-data.php');
    $db = new DBHelper();                                      
    $major = $db->getMajor();
    $json = json_encode($major);
    echo $json;
?>