<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>WildingBnB - Case vacanze, appartamenti e camera in affitto</title>
  <meta name="description" content="Affitta posti unici in qualsiasi località della Sicilia.
	Sentiti a casa ovunque tu sia a prezzi convenienti con WildingBnB">

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ url('/') }}/home_assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ url('/') }}/home_assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ url('/') }}/home_assets/font-awesome/css/all.css" rel="stylesheet"> 
 

 </head>
<body>
<!-- NAVBAR --> 
 <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
	  
        <a href="#" class="brand-logo center">WildingBnB</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="black-text" href="#servizio">I servizi</a></li>
		  <li><a class="black-text" href="#registrazione">cerca</a></li>
		  <li><a class="black-text" href="#entra">Login o registrati</a></li>
        </ul>
		
      </div>
    </nav>
	
  </div>
    
	<ul class="sidenav  grey lighten-3" id="mobile-demo">
		  <li><a href="#servizio">I servizi</a></li>
          <li><a href="#registrazione">Login o registrati</a></li>
		  <li><a href="#registrazione">Ospita</a></li>
	</ul>
    
<!-- INTRO -->
  <div id="index-banner" class="parallax-container">
    <div class="section-intro no-pad-bot">
      <div class="container ">
	
        <h1 class="header center white-text">Sentiti a casa. Ovunque tu sia</h1>
        <div class="row center">
          <h5 class="hcol s12 registrazione-subtitle">Semplicità</h5>
		  <h5 class="hcol s10 "> <em class="white-text">Prenota. Affita. Condividi. Scopri un mondo in pochi click</em></h5>
        </div>
        <div class="row" >
		
		
        </div>
        <br><br>

      </div>
    </div>
    <div class="parallax"><img src="{{ url('/') }}/home_assets/background1.jpg" alt="Unsplashed background img 1"></div>
  </div>

<!-- SERVIZIO -->
<div id="servizio" class="container">
  <div class="container">
    <div class="section">
		<div class="col-servizio">
		  <!--   Icon Section   -->
			<div class="row">			
				<div class="col s12 m4 lg4">
				<div class="icon-block">
					<h2 class="center red-text text-lighten-1"><i class="material-icons">location_city</i></h2>
					<h5 class="center">Affitta appartamenti o stanze in  qualsiasi parte della città</h5>
					<hr class="My-5">
					</div>
					<p class="center red-text">Trova l'appartamento che fa per te a prezzi convenienti</p>
				 </div>
				 
				<div class="col s12 m4 lg4">
				  <div class="icon-block">
					<h2 class="center red-text text-lighten-1"><i class="material-icons">flight_takeoff</i></h2>			
					<h5 class="center">Viaggia e vai alla ricerca dei luoghi che più ti piacciono </h5>	
					<hr class="My-5">
				  </div>  
				  <p class="center red-text">Vivi all'insegna del divertimento e della scoperta</p>
				</div>

				<div class="col s12 m4 lg4">
				  <div class="icon-block">
					<h2 class="center red-text text-lighten-1"><i class="material-icons">home</i></h2>
					<h5 class="center">Sentiti sempre a casa, ovunque tu decida di andare</h5>
					<hr class="My-5">
				  </div>
					<p class="center red-text">Troverai sempre la casa pulita e pronta per essere utilizzata</p>
				</div>
				
		    </div>
		 </div>
     </div>
   </div>
</div>
  <!-- REGISTRAZIONE --> 
  <div id="registrazione" class="parallax-container valign-wrapper">
    <div class="section-registrazione no-pad-bot">
      <div class="container">
        <div class="row center">
		  <i class="material-icons registrazione-icon">location_on</i>
          <h3 class="col s12 light">Sei in cerca della tua prossima destinazione?</h3>
		  <h5 class="col s12 registrazione-subtitle"></h5> 
			<div class="row">
				<div class="input-field col s12 l6 offset-l3">
				<form action="/cerca" method="GET" id="mioform">
					<div class="input-field" style="margin:auto;">
						<div class="input-field col s10">
						<input name="cit_value" placeholder='Cerca per città...' id="first_name2" type="text" class="left validate white-text">
						<label id="testoCerca" class="" for="first_name2" > Cerca qui la tua meta</label>
						</div>

						<div class="col s2">
							<button type="submit" class="btn btn-ospita waves-effect waves-light red lighten-1" style="display:inline-block;text-decoration:none;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:15px;
							line-height:50px;text-align:left;margin-top:30px;height:50px;padding:0px 33px;border-radius:25px;width:150px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:bold;-webkit-font-smoothing:antialiased;-moz	-osx-font-smoothing:grayscale;" s form="mioform" value="Submit">Vai
							<i class="material-icons right">send</i>
						</button>
					</div>
					</div>
				</form>
				</div>
			</div>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="{{ url('/') }}/home_assets/background2.jpg" alt="Unsplashed background img 2"></div>
  </div>
  
<!-- OSPITA -->
	
  <div id="ospita" class="container">
  
    <div class="section">  
      <div class="row">
        <div class="col s12 center">
		  <i class="material-icons ospita-icon red-text text-lighten-1">account_circle</i>
	
          <h3>Ti piacerebbe affittare la tua casa?</h3>
		  
		   <h5 class="col s12 registrazione-subtitle">Clicca in basso per effettuare il login o una nuova registrazione<br></br>  </h5>
	

			<a id='entra' class=' btn btn-registrazione waves-effect waves-light red lighten-10' style="display:inline-block;text-decoration:none;background-color:#267DDD;color:white;cursor:pointer;font-family:Helvetica,Arial,sans-serif;font-size:15px;
				line-height:50px;text-align:center;margin:0;height:50px;padding:0px 33px;border-radius:25px;width:50%;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;
				font-weight:bold;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;" href="/choise_log_reg">Entra</a>

				 
			
        </div>
      </div>
    </div>
  </div>

  
    
<!-- FOOTER --> 
  <footer class="page-footer">
 
    <div class="container">
	
      <div class="row">
        <div class="col l12 s12 ">
        
		</div>    
      </div>
    </div>
	  <div class="copyright float-right">
		<div class="container">
            <div class="row">
				<div class="row">
					<div class="row">
						<div class="row">
							<div class="row"></div>
						</div>
					</div>
			    </div>
				
			</div>
          </div>
	  </div>
   
    </div>
  </footer>

  
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ url('/') }}/home_assets/js/materialize.js"></script>
  <script src="{{ url('/') }}/home_assets/js/init.js"></script>
  
  </body>
</html>
