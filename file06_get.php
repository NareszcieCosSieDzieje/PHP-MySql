<?php
	
	session_start(); 

	$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
	
	if(!$link){
		printf("Connectfailed:%s\n", mysqli_connect_error());
		exit();
	}
	
	if(isSet($_SESSION['QUERY_RES']) && ( $_SESSION['QUERY_RES'] == "Query succeeded") ){
		$_SESSION['QUERY_RES'] = "";
		echo "<script type='text/javascript'>alert('Pracownik dodany poprawnie!');</script>";
	}
	

	$sql = "SELECT * FROM pracownicy";
	$result = $link->query($sql);
	
	foreach($result as $v){
		echo $v["ID_PRAC"]." ".$v["NAZWISKO"]."<br/>";
	}

	echo "<br><a href='file06_post.php'>Formularz Dodania Pracownika</a>";
	$result->free();
	$link->close();
?>