<?php  
session_start();
include("../../baza/config.php"); 
  
if(isset($_POST['login_button'])) {
	$user_login = addslashes(trim($_POST['email']));
	$user_password = addslashes(trim($_POST['pass']));
	$password = md5($user_password);
	
	$sql = "SELECT Email, Haslo FROM baza_uzytkownicy WHERE Email='$user_login'";
	$resultset = mysqli_query($link, $sql) or die("Błąd bazy danych:". mysqli_error($link));
	$row = mysqli_fetch_assoc($resultset);	
		
	if($row['Haslo']==$password){				
		echo "ok";
		$_SESSION['user_session'] = $row['Email'];
	} else {				
		echo "Nieprawidłowy email lub hasło";
	}		
}
mysqli_close($link)
?>