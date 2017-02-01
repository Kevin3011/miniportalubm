<?php

$dsn = "mysql:host=localhost;dbname=dbenterprise";
$user = "root";
$pass = "";

if(isset($_POST['add-major'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$name = $_POST['name'];

		$stmt = $db->prepare("INSERT INTO portal_major (name) VALUES (:name)");
		$stmt->bindParam(':name', $name);
		$stmt->execute();
		header('Location: ..\add-major.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
}
else if(isset($_POST['add-course'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$name = $_POST['name'];
		$code = $_POST['code'];

		$stmt = $db->prepare("INSERT INTO portal_courses (name, code) VALUES (:name, :code)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':code', $code);
		$stmt->execute();
		header('Location: ..\add-course.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
}


?>