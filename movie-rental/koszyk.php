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
			</div>';
			?>
		
     

        <div class="col-lg-9">
            
                <img class="profile-img" src="img/cart2.png" alt="">
            
          <table class="table">
              
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tytuł</th>
                    <th scope="col">Czas</th>
                    <th scope="col">Data wypożyczenia</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opcje</th>
                </tr>
              </thead>
              
                <tbody>
				<?php
					include_once("baza/config.php");
					
					$i = 1;
					
					$uzytkownikid = "SELECT ID FROM baza_uzytkownicy WHERE Email = '".$_SESSION['user_session']."'";
					$uzytkownikid2 = mysqli_query($link, $uzytkownikid) or die("Błąd bazy danych:". mysqli_error($link));
					$uzytkownikid3 = mysqli_fetch_assoc($uzytkownikid2);
					
					$koszykinfo = "SELECT * FROM baza_wypozyczenia WHERE ID_uzytkownicy = ".$uzytkownikid3['ID']."";
					$koszykinfo2 = mysqli_query($link, $koszykinfo) or die("Błąd bazy danych:". mysqli_error($link));
					
					while($wynik = mysqli_fetch_assoc($koszykinfo2)){
						
						$nazwafilmu = "SELECT Nazwa FROM baza_filmy WHERE ID = ".$wynik['ID_filmy']."";
						$nazwafilmu2 = mysqli_query($link, $nazwafilmu) or die("Błąd bazy danych:". mysqli_error($link));
						$nazwafilmu3 = mysqli_fetch_assoc($nazwafilmu2);
					
						echo '
						<tr>
							<th scope="row">'.$i.'</th>
							<td>'.$nazwafilmu3['Nazwa'].'</td>
							<td>'.$wynik['CzasWypozyczenia'].'h</td>
							<td>'.$wynik['DataWypozyczenia'].'</td>
							<td>'.$wynik['Cena'].' zł</td>
							<td><span class="badge ';
							if($wynik['Status'] == "Dodano"){
							echo 'badge-secondary';}
							if($wynik['Status'] == "Trwa"){
							echo 'badge-success';}
							if($wynik['Status'] == "Zakończono"){
							echo 'badge-info';}
							echo'">'.$wynik['Status'].'</span></td>
							<td><a class="btn btn-warning brn-sm">';
							if($wynik['Status'] == "Dodano"){
							echo 'Zapłać';}
							if($wynik['Status'] == "Trwa"){
							echo 'Przedłuż';}
							if($wynik['Status'] == "Zakończono"){
							echo 'Wypożycz';}
							echo'
							</a></td>
						</tr>';
						
						$i++;
					}
				?>
              </tbody>
            </table>

        </div>
        <!-- /.col-lg-9 -->

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