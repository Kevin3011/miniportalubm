<?php
    header('Content-Type: application/json');

    if(isset($_POST['major'])){
        if(isset($_REQUEST)){
            $requestData = $_REQUEST;
        }
        
        require_once('../action/get-data.php');
        $db = new DBHelper();                                      
        $course = $db->getMappingCourse($_POST['major']);
        if(isset($_POST['platform'])){
            if($_POST['platform'] == "web"){
                $totalData = count($course);
                $totalFiltered = $totalData;
                $json = json_encode(
                    array("draw" => intval($requestData['draw']), // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
                    "recordsTotal"    => intval( $totalData ),  // total number of records
                    "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
                    "data" => $course)
                    );
                echo $json;
            }
        }
    }
?>