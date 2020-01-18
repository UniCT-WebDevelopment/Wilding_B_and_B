<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Registrati o fai il login</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ url('/') }}/home_assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ url('/') }}/home_assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ url('/') }}/home_assets/font-awesome/css/all.css" rel="stylesheet"> 
	
  <style>
	.myButton{
		text-decoration:none;
		color:white;
		font-family:Helvetica,Arial,sans-serif;
		font-size:15px;
		line-height:50px;
		text-align:center;margin:0;
		 height:50px;
		padding:0px 33px;
		border-radius:25px;
		width:45%;
		font-weight:bold;
		-webkit-font-smoothing:antialiased;
		-moz-osx-font-smoothing:grayscale;
		margin:15px;
	}
	.collapsible-header{
		border:none;
		overflow-x:visible;	
		border-radius: 25px;
	}
	.collapsible{
		margin-left:25%;
		margin-right:25%;
		min-width:50%;	
		border-radius: 25px;
	}
	.collapsible-body{
		border-bottom:0.5px solid grey;
		border-radius: 25px;
	}
	
	.myLink{
		underline:none;
		color:black;
		font-weight:bold;	
	}
	
	.myContainer{
		overflow:hidden;
		border:none;
		border-width: 0.01em;
		position:relative;
		margin-left:25%;
		margin-right:25%;
		margin-top:5%;
		min-height:220px;
		padding-top:2%;
		padding-bottom:2%;	
		padding-right:0%;	
		padding-left:0%;	
		width:50%;
	}
	@media (max-width: 550px) {
     .myContainer {
		overflow:hidden;
		border:none ;
		border-width: 0.01em;
		position:relative;
		margin-left:10%;
		margin-right:10%;
		margin-top:5%;
		min-height:180px;
		padding-top:2%;
		padding-bottom:2%;	
		padding-right:0%;	
		padding-left:0%;	
		width:80%;	
	  }
	  
	  .collapsible{
		margin-left:10%;
		margin-right:10%;
		min-width:80%;	
	}
    
	}

  </style>

 </head>
<body>
<!-- NAVBAR --> 
 <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
	  
        <a href="#" class="brand-logo center">WildingBnB</a>
		<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <li><a class="black-text" href="/">Home</a></li>	  
        </ul>
		
      </div>
    </nav>
  </div>
	<ul class="sidenav  grey lighten-3" id="mobile-demo">
		  <li><a href="/">Home</a></li>     
	</ul>
    
<!-- INTRO -->
  <div id="index-banner">
    <div class="section-intro no-pad-bot">
	
	 <!--<h3 class="center black-text">Effettua il login</h1>-->
      <div class="container ">
        <div class="row center">
		<div class="myContainer">
			<ul class="collapsible">
			<li>
			  <div class="collapsible-header white-text red lighten-1"><i class="material-icons">account_circle</i>Login </div>
			  <div class="collapsible-body"><a class="myLink" href="/login?user=albergatore">Login Albergatore</a></div>
			  <div class="collapsible-body"><a class="myLink" href="/login?user=cliente">Login Cliente</a></div>	
			</li>
			</ul>
			<div class="row center"></div>
			<ul class="collapsible">
			<li>
			   <div class="collapsible-header white-text teal lighten-1"><i class="material-icons">edit</i>Registrati </div>
			  <div class="collapsible-body"><a class="myLink" href="/reg_alb">Registrazione Albergatore</a></div>
			  <div class="collapsible-body"><a class="myLink" href="/reg_cli">Registrazione Cliente</a></div>		 
			</li>
			</ul>
		</div>
        </div>	
        </div>
      </div>
    </div>
  
  <!--  Scripts per Accordion Jquery-->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });
  
  </script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ url('/') }}/home_assets/js/materialize.js"></script>
  <script src="{{ url('/') }}/home_assets/js/init.js"></script>
  
  </body>
</html>
