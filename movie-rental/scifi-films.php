<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl_PL">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wypożyczalnia filmów</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
      
      <link rel="icon" type="image/png" href="img/favicon.ico"/>
      
      <!-- czcionka -->
      
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      
      <!-- newsletter-->
      <link rel="stylesheet" href="css/linearicons.css">
      
      
      <!-- kontakt -->
      <link href="css/main.css" rel="stylesheet">
      <link href="css/util.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
      <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
      

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top menu-color" id="mainNav">
      <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/icon.png" alt="" class="img-responsive logo"></a>
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Wypożyczalnia "KADR"</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <a class="nav-link" href="index.php">Strona główna</a>
            </li>
          
            <li class="dropdown">
              <a class="nav-link js-scroll-trigger" href="#about">Filmy</a>
                <div class="dropdown-content">
                    <a href="action-films.php">Filmy akcji</a>
                    <a class="js-scroll-trigger" href="#about">Filmy sci-fi</a>
                    <a href="family-films.php">Filmy familijne</a>
    
                </div>
            </li>
               
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Kontakt</a>
            </li>
			<?php
			if(isset($_SESSION['user_session'])){
				echo '
				<li class="dropdown">
				<a class="nav-link">Profil<img src="img/icon2.png" alt="" class="img-responsive user"></a>
                <div class="dropdown-content">
                    <a href="konto.php">Konto</a>
					<a href="koszyk.php">Koszyk</a>
                    <a href="logowanie/logout.php">Wyloguj się</a>
                </div>
				</li>';
			}
			else{
				echo '
				<li class="nav-item">
				<a class="nav-link js-scroll-trigger" href="logowanie/logowanie.php">Zaloguj się <img src="img/icon2.png" alt="" class="img-responsive user"></a>
				</li>';
			}
			?>
          </ul>
        </div>
      </div>
    </nav>
      
      
      
      
      
 
      <header>
	  <?php
	  if(isset($_POST['Koszyk']) ){
		  if(!isset($_SESSION['user_session'])){
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Uwaga!</strong> Aby dodawać rzeczy do koszyka musisz się najpierw zalogować.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		  }
		  else{
			include_once("baza/config.php");
			
			$uzytkownikid = "SELECT ID FROM baza_uzytkownicy WHERE Email = '".$_SESSION['user_session']."'";
			$uzytkownikid2 = mysqli_query($link, $uzytkownikid) or die("Błąd bazy danych:". mysqli_error($link));
			$uzytkownikid3 = mysqli_fetch_assoc($uzytkownikid2);
			
			$filminfo = "SELECT * FROM baza_filmy WHERE ID = '".$_POST['Koszyk']."'";
			$filminfo2 = mysqli_query($link, $filminfo) or die("Błąd bazy danych:". mysqli_error($link));
			$filminfo3 = mysqli_fetch_assoc($filminfo2);
			
			$add = "INSERT INTO baza_wypozyczenia (ID, ID_filmy, ID_uzytkownicy, CzasWypozyczenia, DataWypozyczenia, Cena, Status) VALUES ('', '".$_POST['Koszyk']."', '".$uzytkownikid3['ID']."', '42', '".date("Y-m-d H:i:s")."', '".$filminfo3['Cena42']."', 'Dodano')";
		  
			if ($link->query($add) === TRUE) {
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Sukces!</strong> Owy film został pomyślnie dodany do Twojego koszyka.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
			}
			else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Problem!</strong> Z niewiadomych przyczyn owy film nie mógł zostać dodany do Twojego koszyka.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
			}
		  }
	  }
	?>


<!-- Container element -->
<div class="parallax text-center">
    <h2 class="movies-h">Najlepsze filmy w jednym miejscu<br>i w zasięgu Twojej ręki</h2>
          </div>

    </header>
      
      
      
      

    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <h2 class="about-h">Filmy akcji</h2>
            </div>            
        </div>
          
          <div class="row movies-padding">
			<?php
			include_once("baza/config.php");
			
			$filmy = "SELECT * FROM  baza_filmy WHERE Kategoria = 2";
			$filmy2 = mysqli_query($link, $filmy) or die("Błąd bazy danych:". mysqli_error($link));
	
			$row_cnt = mysqli_num_rows($filmy2);
			
			if($row_cnt == 0){
				echo 'Niestety brak filmów w kategorii Akcja w naszej bazie';
			}
			else{
				while($wynik = mysqli_fetch_assoc($filmy2)){
					echo '
					<div class="col-lg-4 col-md-6 mb-4 text-center">
					  <div class="card h-100">
					  <form method="post" action="movie-details.php">
						<input name="film" value="'.$wynik['ID'].'" type="image" class="card-img-top" src="img/'.$wynik['ID'].'.jpg" alt="">
						</form>
						<div class="card-body">
						  <h4 class="card-title ">
							<a class="tytul-kolor" href="#">'.$wynik['Nazwa'].'</a>
						  </h4>
						  <h5>cena za 42h: '.$wynik['Cena42'].'zł</h5>
						  <p class="tekst-rozm">'.$wynik['Opis'].'</p>
						</div>
						<div class="card-footer">
						<form method="post" action="scifi-films.php">
						  <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small><button type="submit" class="btn button">Dodaj do koszyka</a>
						  <input type="hidden" value="'.$wynik['ID'].'" name="Koszyk" id="Koszyk">
						  </form>
						</div>
					  </div>
					</div>';
				}
			}
			?>

          </div>
          
      </div>
    </section>
      
      <!-- newsletter -->

    <div class="parallax3 text-center" >
    
        <h3 class="news-tekst">Bądź na bieżąco - zapisz się do newslettera!</h3>
		<form method="post" action="index.php">
			<div class="form-group row" style="width: 100%">
				<div class="col-lg-12 col-md-12 news-padd">
						<input class="news-mail" id="EMAIL" name="EMAIL" placeholder="Wpisz swój e-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Wpisz swój e-mail '" required="" type="email">
				</div>
				<div class="col-lg-12 col-md-12">
					<button type="submit" class="btn news-but">Zapisz&emsp;<span class="lnr lnr-arrow-right"></span></button>
				</div>
			</div>
		</form>		
        
    </div>
      
    <section id="contact">
        
        
        
        <div class="wrap-contact100 text-center">
			<form class="contact100-form validate-form" id="contactForm" >
				<span class="contact100-form-title">
					MASZ PYTANIE? SKONTAKTUJ SIĘ Z NAMI!
				</span>
				
				<div class="wrap-input100 validate-input" data-validate="Wymagane pole">
					<span class="label-input100">Imię i Nazwisko</span>
					<input class="input100" type="text" id="name" name="name" placeholder="Podaj imię i nazwisko/login">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Zły format. Podaj poprawny np.: ex@abc.xyz">
					<span class="label-input100">Email</span>
					<input class="input100" type="text" id="email" name="email" placeholder="Twój adres e-mail">
					<span class="focus-input100"></span>
				</div>


				<div class="wrap-input100 validate-input" data-validate = "Wymagane pole">
					<span class="label-input100">Wiadomość</span>
					<textarea class="input100" id="message" name="message" placeholder="Treść wiadomości"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button class="btn contact100-form-btn kontakt-but">
							Wyślij
						</button>
					</div>

					<div id="msgSubmit" class="h3 text-center hidden"></div>
					<div class="clearfix"></div>
					
				</div>
			</form>
		</div>
        
     
    </section>
      
      

    <!-- Footer -->
    <footer class="py-5 menu-color">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Wypożyczalnia filmów "Kadr" 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom JavaScript for this theme -->
    <script src="js/scrolling-nav.js"></script>
      
      <!-- kontakt -->
      
      <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
      <script src="vendor/animsition/js/animsition.min.js"></script>
      <script src="vendor/bootstrap/js/popper.js"></script>
      <script src="vendor/select2/select2.min.js"></script>
      <script src="vendor/daterangepicker/moment.min.js"></script>
      <script src="vendor/daterangepicker/daterangepicker.js"></script>
      <script src="vendor/countdowntime/countdowntime.js"></script>
      <script src="js/main.js"></script>
	  <script type="text/javascript" src="js/form-scripts.js"></script>

  </body>

</html>
