<?php 

	session_start(); 

	$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
	
	if(!$link){
		printf("Connectfailed:%s\n", mysqli_connect_error());
		exit();
	}

	$good = false;
	if(isSet($_POST['submitWorker'])){
		if( isSet($_POST['id_prac']) && is_numeric($_POST['id_prac']) && is_string($_POST['nazwisko'])){

			$sql = "INSERT INTO pracownicy(id_prac,nazwisko) VALUES(?,?)";
			$stmt = $link->prepare($sql);
			$stmt->bind_param("is",$_POST['id_prac'],$_POST['nazwisko']);
			$result = $stmt->execute();
			
			if(!$result){
				$good = false;
				//printf("Query failed:%s\n", mysqli_error($link));
			} else {
				$good = true;
			}
			$stmt->close();
		}
	}
	$link->close(); 
	if($good){
		$_SESSION['QUERY_RES'] = "Query succeeded";
		header("Location: file06_get.php"); 
	} else {
		$_SESSION['QUERY_RES'] = "Query failed";                   
		header("Location: file06_post.php");
	}
?>