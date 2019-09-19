<?php

	include_once("baza/config.php");
	
	$ostatnieID = "SELECT * FROM  baza_filmy ORDER  BY  1 DESC  LIMIT  6;";
	$ostatnieID2 = mysqli_query($link, $ostatnieID) or die("Błąd bazy danych:". mysqli_error($link));
	
    $row_cnt = mysqli_num_rows($ostatnieID2);
	
	for($i = 0; $i < $row_cnt; $i++){
		$wynik =  mysqli_fetch_assoc($ostatnieID2);
		$tablica_ostatnie[$i] = $wynik['ID'];
	}
	
	
	$akcjaID = "SELECT ID FROM baza_filmy WHERE Kategoria = 1";
	$akcjaID2 = mysqli_query($link, $akcjaID) or die("Błąd bazy danych:". mysqli_error($link));
	
    $row_cnt = mysqli_num_rows($akcjaID2);
	
	for($i = 0; $i < $row_cnt; $i++){
		$wynik =  mysqli_fetch_assoc($akcjaID2);
		$tablica_akcja[$i] = $wynik['ID'];
	}
	
	shuffle($tablica_akcja);
	
	
	$scifiID = "SELECT ID FROM baza_filmy WHERE Kategoria = 2";
	$scifiID2 = mysqli_query($link, $scifiID) or die("Błąd bazy danych:". mysqli_error($link));
	
    $row_cnt = mysqli_num_rows($scifiID2);
	
	for($i = 0; $i < $row_cnt; $i++){
		$wynik =  mysqli_fetch_assoc($scifiID2);
		$tablica_scifi[$i] = $wynik['ID'];
	}
	
	shuffle($tablica_scifi);
	
	
	$familyID = "SELECT ID FROM baza_filmy WHERE Kategoria = 3";
	$familyID2 = mysqli_query($link, $familyID) or die("Błąd bazy danych:". mysqli_error($link));
	
    $row_cnt = mysqli_num_rows($familyID2);
	
	for($i = 0; $i < $row_cnt; $i++){
		$wynik =  mysqli_fetch_assoc($familyID2);
		$tablica_family[$i] = $wynik['ID'];
	}
	
	shuffle($tablica_family);
	
	//mysqli_close($link)
?>