<?php  
session_start();
include("../../baza/config.php"); 
  
if(isset($_POST['register_button'])) {
	$user_login = addslashes(trim($_POST['email']));
	$user_password = addslashes(trim($_POST['pass']));
	$user_name = addslashes(trim($_POST['imie']));
	$user_surname = addslashes(trim($_POST['nazwisko']));
	
	$password = md5($user_password);
	
	$sql = "INSERT INTO baza_uzytkownicy (ID, Imie, Nazwisko, Email, Haslo) VALUES ('', '$user_name', '$user_surname', '$user_login', '$password')";	
	if ($link->query($sql) === TRUE) {			
		echo "ok";
		$_SESSION['user_session'] = $user_login;
	} else {				
		echo "Coś poszło nie tak";
	}		
}
mysqli_close($link)
?>