<?php
	session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
	<body>
		
	<?php
		if(isSet($_SESSION['QUERY_RES']) && ( $_SESSION['QUERY_RES'] == "Query failed") ){
					$_SESSION['QUERY_RES'] = "";
					echo "<script type='text/javascript'>alert('Błąd dodawania pracownika!');</script>";
		}
	?>
		<form action="file06_redirect.php" method="POST">
			id_prac<input type="text" name="id_prac">
			nazwisko<input type="text" name="nazwisko">
			<input type="submit" value="Wstaw" name="submitWorker">
			<input type="reset" value="Wyczysc">
	</form>
	<br>
		<a href="file06_get.php">Lista Wszystkich Pracowników</a>
	</br>
</body>
</html>
