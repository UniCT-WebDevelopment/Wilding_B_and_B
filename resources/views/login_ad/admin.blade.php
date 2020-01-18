<!DOCTYPE html>
<html lang="it">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Admin login</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="{{ url('/') }}/home_assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="{{ url('/') }}/home_assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="font-awesome/{{ url('/') }}/home_assets/css/all.css" rel="stylesheet"> 
	
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
		border-radius: 25px;
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
		border:1px solid black;
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
	
	#myLabel:hover{
		cursor: context-menu;
	}
	
	@media (max-width: 550px) {
     .myContainer {
		overflow:hidden;
		border:none;
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
		
		.myP{
			font-family:Helvetica,Arial,sans-serif;
			font-size:10px;	
			align:left;
		}
	
		
	}
	.myP{
		font-family:Helvetica,Arial,sans-serif;
		font-size:12px;
			
	}
	
  </style>

 </head>
<body>
<!-- NAVBAR --> 
 <div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper white">
	  
        <a href="/" class="brand-logo center">WildingBnB</a>
		
		
      </div>
    </nav>
  </div>
	<ul class="sidenav  grey lighten-3" id="mobile-demo">
		  <li><a href="#servizio">Home</a></li>     
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
			  <div id="myLabel" class="collapsible-header white-text black lighten-1"><i class="material-icons">supervisor_account</i>Admin Login
			  </div>
			  <div class="input-field col s12">
				<br>
				<form name="myform" method="POST" action="/login_ad/admin_su">
                  {{ csrf_field() }}
                  <div class="row">
					<div class="input-field col s12">
					  <input placeholder="admin" id="first_name" name="id" type="text" class="validate" >
					  <label for="first_name">Username</label>
					</div>
				  </div>
				 <div class="row">
					<div class="input-field col s12">
						<input placeholder="admin" id="password" name="pass" type="password" class="validate" >
						<label for="password">Password</label>
					</div>
			      </div>
				  <div class="row">
					<a onClick= mySubmit() class="waves-effect waves-light  black  btn myButton " id="btn"><p class="myP">Login</p></a>
				  </div>
				</form>
			  </div>
			</li>
			</ul>
		
			
		</div>
        </div>	
        </div>
      </div>
    </div>
  
  <!--  Scripts per Accordion Jquery-->
  <script>
  
  function mySubmit(){
	document.myform.submit();
  };
  </script>
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="{{ url('/') }}/home_assets/js/materialize.js"></script>
  <script src="{{ url('/') }}/home_assets/js/init.js"></script>
  
  </body>
</html>
