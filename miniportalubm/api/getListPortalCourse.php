<?php
    header('Content-Type: application/json');

    require_once('../action/get-data.php');
    $db = new DBHelper();                                      
    $course = $db->getCourse();
    $json = array("data"=>$course);
    echo json_encode($json);
?>