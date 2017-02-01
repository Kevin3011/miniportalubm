<?php

$dsn = "mysql:host=localhost;dbname=dbenterprise";
$user = "root";
$pass = "";

if(isset($_POST['edit-major'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$nameNew = $_POST['nameNew'];
		$name = $_POST['name'];
		
		$stmt = $db->prepare("UPDATE portal_major SET name = :nameNew WHERE name = :name");
		$stmt->bindParam(':nameNew', $nameNew);
		$stmt->bindParam(':name', $name);

		$stmt->execute();
		header('Location: ..\add-major.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
}else if(isset($_POST['del-major'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$name = $_POST['name'];

		$stmt = $db->prepare("DELETE FROM portal_major WHERE name = :name");
		$stmt->bindParam(':name', $name);
		$stmt->execute();
		header('Location: ..\add-major.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
	
}else if(isset($_POST['edit-course'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$nameNew = $_POST['nameNew'];
		$name = $_POST['name'];
		$codeNew = $_POST['codeNew'];
		$code = $_POST['code'];
		
		$stmt = $db->prepare("UPDATE portal_courses SET name = :nameNew WHERE name = :name");
		$stmt->bindParam(':nameNew', $nameNew);
		$stmt->bindParam(':name', $name);

		$stmt->execute();
		header('Location: ..\add-course.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
}else if(isset($_POST['del-course'])){
	try{
		$db = new PDO($dsn,$user,$pass);

		$name = $_POST['name'];

		$stmt = $db->prepare("DELETE FROM portal_courses WHERE name = :name");
		$stmt->bindParam(':name', $name);
		$stmt->execute();
		header('Location: ..\add-course.php');
	}catch(PDOException $e){
		echo $e.getMessage();
	}
	
}




?>