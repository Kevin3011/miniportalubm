<?php

	try{
		$db = new PDO('mysql:host=localhost;dbname=enterprisedb','root','');
		

		$sql = "SELECT * FROM mahasiswa";
		$result = $db->query($sql);

		while($row = $result->fetch()){
			echo $row['name'];
			echo "<br/>";
		}
	}catch(PDOException $e){
		echo $e->getMessage();
	}
?>
