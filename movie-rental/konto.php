<?php
session_start();
if(!isset($_SESSION['user_session'])){
	header("Location: index.php");
}
include_once("baza/config.php");
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
              <a class="nav-link">Filmy</a>
                <div class="dropdown-content">
                    <a href="action-films.php">Filmy akcji</a>
                    <a href="scifi-films.php">Filmy sci-fi</a>
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
	  if(isset($_POST['EMAIL']) ){
		$checkmail = "SELECT ID FROM baza_newsletter WHERE Email = '".$_POST['EMAIL']."'";
		$checkmail2 = mysqli_query($link, $checkmail) or die("Błąd bazy danych:". mysqli_error($link));
	
		$row_cnt = mysqli_num_rows($checkmail2);
		
		if($row_cnt == 0){
			$query = "INSERT INTO baza_newsletter (ID, Email) VALUES ('', '".$_POST['EMAIL']."')";
			if ($link->query($query) === TRUE) {
			echo '
			<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Dziękujmy!</strong> Pomyślnie dodano twój adres email do naszej bazy.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
			}
			else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Problem!</strong> Z niewiadomych przyczyn twój adres email nie mógł zostać dodany.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
			}
		}
		else{
		  echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Błąd!</strong> W naszej bazie istnieje już owy adres email.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		}
	  }

	  if(isset($_POST['oldpassword']) ){
		  
		  $checkprofile = "SELECT * FROM baza_uzytkownicy WHERE Email = '".$_SESSION['user_session']."'";
		  $checkprofile2 = mysqli_query($link, $checkprofile) or die("Błąd bazy danych:". mysqli_error($link));
		  $checkprofile3 = mysqli_fetch_assoc($checkprofile2);
		  
		  
		  if($checkprofile3['Haslo'] == md5($_POST['oldpassword'])){
			  
			  if($_POST['newpassword1'] == $_POST['newpassword2']){
				  
				  $md5pass = md5($_POST['newpassword1']);
				  $query = "UPDATE baza_uzytkownicy SET Haslo = '".$md5pass."' WHERE Email = '".$checkprofile3['Email']."'";
				  
				  if ($link->query($query) === TRUE) {
					echo '
					<div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
					  <strong>Sukces!</strong> Pomyślnie zmieniono hasło.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>';
				  }
				  else{
					echo '
					<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
					  <strong>Błąd!</strong> Wystąpił nieznany błąd podczas wprowadzania danych do bazy.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					  </button>
					</div>';
				  }
			  }
			  else{
				echo '
				<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
				  <strong>Błąd!</strong> Błędnie powtórzone nowe hasło.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				  </button>
				</div>';
			  }
		  }
		  else{
			echo '
			<div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom:0px; text-align:center;">
			  <strong>Błąd!</strong> Podano złe stare hasło.
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>';
		  }
	  }
	  ?>


<!-- Container element -->
<div class="parallax_profile text-center">
    <h2 class="det-h">Witamy ponownie!</h2>
          </div>

    </header>
      
      
      
      
    <section id="about" class="det-padding">
      <div class="container">
          <div class="row">
			<?php 
			
			$info = "SELECT * FROM baza_uzytkownicy WHERE Email = '".$_SESSION['user_session']."'";
			$info2 = mysqli_query($link, $info) or die("Błąd bazy danych:". mysqli_error($link));
			$info3 =  mysqli_fetch_assoc($info2);
			
		echo '
        <div class="col-lg-3">
          <h1 class="my-4">'.$info3['Imie'].' '.$info3['Nazwisko'].'</h1>
          <div class="list-group">
            <a class="list-group-item det-menu-a2" href="logowanie/logout.php">⟵&emsp;Wyloguj</a>
          </div>
        </div>
     

        <div class="col-lg-9">
            
             <img class="profile-img2" src="img/profile.png" alt="">
            
          <form class="contact100-form validate-form">
              
              <div class="profile-header">Dane personalne</div>
              
				<div class="wrap-input100 validate-input" data-validate="Wymagane pole">
					<span class="label-input100">Imię i Nazwisko</span>
					<input class="input100" type="text" name="name" value="'.$info3['Imie'].' '.$info3['Nazwisko'].'" disabled>
					<span class="focus-input100"></span>
				</div>

              <div class="wrap-input100 validate-input" data-validate = "Zły format. Podaj poprawny np.: ex@abc.xyz">
					<span class="label-input100">Adres email</span>
					<input class="input100" type="text" name="email" value="'.$info3['Email'].'" disabled>
					<span class="focus-input100"></span>
				</div>
              
			</form>
            
            <form method="post" action="konto.php" class="contact100-form">
              
              <div class="profile-header">Zmień hasło</div>
              
				<div class="wrap-input100 validate-input" data-validate="Złe hasło">
					<span class="label-input100">Stare hasło</span>
					<input class="input100" type="password" name="oldpassword" placeholder="Podaj hasło">
					<span class="focus-input100"></span>
				</div>

              <div class="wrap-input100 validate-input" data-validate = "Złe hasło">
					<span class="label-input100">Nowe hasło</span>
					<input class="input100" type="password" name="newpassword1" placeholder="Podaj nowe hasło">
					<span class="focus-input100"></span>
				</div>
              
              
				<div class="wrap-input100 validate-input" data-validate = "Złe hasło">
					<span class="label-input100">Powtórz nowe hasło</span>
					<input class="input100" type="password" name="newpassword2" placeholder="Powtórz hasło">
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<button type="submit" class="btn profile-button">Zapisz</button>
					</div>
				</div>
			</form>

        </div>';
        
		?>
      </div>
          
      </div>
    </section>
      
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
