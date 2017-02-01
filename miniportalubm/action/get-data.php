<?php
class DBHelper{
    private $dsn = "mysql:host=localhost;dbname=dbenterprise";
    private $user = "root";
    private $pass = ""; 

    function fetchData($query){
        $db = new PDO($this->dsn,$this->user,$this->pass);
        $result = $db->query($query);
        return $result;    
    }
//
//
//SELECT pc.name, pc.code FROM portal_courses AS pc WHERE pc.id NOT IN (SELECT  gmc.portal_courses_id FROM portal_group_of_major_courses AS gmc WHERE gmc.portal_major_id = 1)
//

    function getMajor(){
        $major = array();
        try{    
            $result = $this->fetchData("SELECT name FROM portal_major");
            while($row = $result->fetch()){
                array_push($major, new major($row['name']));
            }
        }catch(PDOException $e){
            echo $e.getMessage();
        }
        return $major;
    }   

    function getCourse(){
        $course = array();
        
        //param 0 is "name" param 1 is "type"
        try{    
            if(null != func_get_arg(0) && null != func_get_arg(1)){
                if(func_get_arg(1) == "name"){
                    $name = func_get_arg(0);
                    $result = $this->fetchData("SELECT name,code FROM portal_courses WHERE name='".$name."'");
                }
            }else{
                $result = $this->fetchData("SELECT name,code FROM portal_courses");
            }
            while($row = $result->fetch()){
                array_push($course, new course($row['name'],$row['code']));
            }
        }catch(PDOException $e){
            echo $e.getMessage();
        }
        
        return $course;
    }
    function getMappingCourse($name){
        $course = array();
        try{    
        $query = "SELECT pc.name, pc.code FROM portal_courses AS pc WHERE pc.id NOT IN (SELECT  gmc.portal_courses_id FROM portal_group_of_major_courses AS gmc, portal_major AS pm WHERE gmc.portal_major_id = pm.id AND pm.name = '".$name."')";

        $result = $this->fetchData($query);
        
        while($row = $result->fetch()){
             array_push($course, new course($row['name'],$row['code']));
        }
        }catch(PDOException $e){
            echo $e.getMessage();
        }
        
        return $course;
    }
}

class major{
    public $name = array();
    
    function __construct($name){
        $this->name = $name;
    }
}

class course{
    public $name = array();
    public $code = array();
    function __construct($name,$code) {
        $this->name = $name;
        $this->code = $code;
    }   
}



?>       