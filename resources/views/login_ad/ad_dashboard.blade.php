<!doctype html>
<html lang="it">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Admin control panel</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/admin/ad_dashboard/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="{{ url('/') }}/admin/ad_dashboard/img/favicon.png" />

	<!-- Fonts and icons  -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	
	<link href="{{ url('/') }}/admin/ad_dashboard/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/admin/ad_dashboard/css/material-bootstrap-wizard.css" rel="stylesheet" />
	
	<link href="{{ url('/') }}/admin/ad_dashboard/css/demo.css" rel="stylesheet" />
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

	<script type="text/javascript" src="http://www.expertphp.in/js/jquery.form.js"></script>
		<script>
		function preview_images() {
		
		 var total_file=document.getElementById("images").files.length;
		 var max_foto = 8;
		 for(var i=0;i<max_foto;i++){
		 
			if(total_file >= max_foto){
				document.getElementById("contenitoreInput").style.display = "none";
				//alert("Hai selezionato"+total_file);
			}
			$('#image_preview').append(" <div id='frameFoto'class='col-md-3'><i id='close' class='material-icons' onclick=rimuovi() title='Elimina la foto' ;>close</i><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
			
		 }
		}
		function rimuovi(){
			$('#frameFoto').remove();
		}
		
	</script>
	<style>
		img{
			max-width:120px;
			max-height:120px;
		}
		
		.opaco{
			opacity: 0.0;
			padding:0px;
			z-index:-1;
			display:none;
			
		}
		#contenitoreInput{
			margin-top:-3%;
			
		}
		#close{
			cursor:pointer;
			position:absolute;
			font-size:25px;
			z-index:99999;
			background:rgb(10,10,10,0.1);
			
		}
				
		#labelInput{
			border: 1px solid #ccc;
			display: inline-block;
			padding: 6px 12px;
			cursor: pointer;
			padding-bottom:0px;
		}
		
		#image_preview{
			background:#F5F5F5;
		}
		
		.col-sm-3>input {
		  display: none;
		}
		
		#formdiv {
		  text-align: center;
		}
		#file {
		  color: green;
		  padding: 5px;
		  border: 1px dashed #123456;
		  background-color: #f9ffe5;
		}
		#img {
		  width: 17px;
		  border: none;
		  height: 17px;
		  margin-left: -20px;
		  margin-bottom: 191px;
		}
		.upload {
		  width: 100%;
		  height: 30px;
		}
		.previewBox {
		  text-align: center;
		  position: relative;
		  width: 150px;
		  height: 150px;
		  margin-right: 10px;
		  margin-bottom: 20px;
		  float: left;
		}
		.previewBox img {
		  height: 150px;
		  width: 150px;
		  padding: 5px;
		  border: 1px solid rgb(232, 222, 189);
		}
		.delete {
		  color: red;
		  font-weight: bold;
		  position: absolute;
		  top: 0;
		  cursor: pointer;
		  width: 20px;
		  height:  20px;
		  border-radius: 50%;
		  background: #ccc;
		}
		
		#images{
			background:black;
			
		}
		.wizard-card[data-color="black"] .moving-tab {
			background-color: black;
		}
		
		#logout{
			cursor:pointer;
		}
		
	</style>
</head>


<body>
	<div class="image-container set-full-height" style="background-image: url('https://cdn.pixabay.com/photo/2014/10/03/17/16/gear-472000_960_720.jpg')">
	
	    
		 <div class="logo-container ">
			 
			<div class="brand">
				Logout &nbsp<label style="color:black;">
				<span>
					 <br><i id="logout" onclick= "exit()" class="large material-icons">exit_to_app</i>
				</span>
				</label>
			</div>
		</div>

		

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-12 col-lg-12 col-md-12 ">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="black" id="wizard">
			                <form action="/login_ad/lista_user" method="post">
							{{ csrf_field() }}
		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Admin Control Panel   <i class="large material-icons">build</i>
		                        	</h3>
									<h5>Pannello di selezione e modifica</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#tipoUtente" data-toggle="tab">Tipologia utente </a></li>
			                            
										<li id="secondoStep" style="display:none"><a href="#tipoModifica" data-toggle="tab">Tipologia oggetto</a></li>
										
										
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="tipoUtente">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h4 class="info-text">Scegli l'utente da modificare</h4>
		                                	</div>
		                                	
		                                	<div class="col-sm-6">
		                                    	<div class="form-group label-floating">
		                                             <div class="choice" data-toggle="wizard-radio" rel="tooltip" onclick="abilita()">
		                                                <input id="radioc" type="radio" name="utente" value="cliente" />
		                                                <div class="icon">
		                                                    <i class="large material-icons">face</i>
		                                                </div>
		                                                <h6>Cliente</h6>
		                                            </div>
	                                        	</div>
		                                	</div>
		                                	<div class="col-sm-6 ">
		                                    	<div class="form-group label-floating">
		                                        	<div class="form-group label-floating">
		                                             <div class="choice" data-toggle="wizard-radio" rel="tooltip" onclick="abilita()">
		                                                <input id="radioa" type="radio" name="utente" value="albergatore" />
		                                                <div class="icon" >
		                                                    <i class="large material-icons">account_circle</i>
		                                                </div>
		                                                <h6>Albergatore</h6>
		                                            </div>
	                                        	</div>
		                                    	</div>
		                                	</div>
											<!--
		                                	
											-->
		                            	</div>
		                            </div>
							
									<div class="tab-pane" id="tipoModifica">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h4 class="info-text">Scegli cosa vuoi modificare</h4>
		                                	</div>
		                                	
		                                	<div class="col-sm-6">
		                                    	<div class="form-group label-floating">
		                                             <div class="choice" data-toggle="wizard-radio" rel="tooltip" onclick="abilitaFine()">
		                                                <input type="radio" name="operazione" value="lista_inserzione" />
		                                                <div class="icon">
		                                                    <i class="large material-icons">bookmark_border</i>
		                                                </div>
		                                                <h6>Inserzione / prenotazione</h6>
		                                            </div>
	                                        	</div>
		                                	</div>
		                                	<div class="col-sm-6 ">
		                                    	<div class="form-group label-floating">
		                                        	<div class="form-group label-floating">
		                                             <div class="choice" data-toggle="wizard-radio" rel="tooltip" onclick="abilitaFine()">
		                                                <input type="radio" name="operazione" value="mod_dati" />
		                                                <div class="icon" >
		                                                    <i class="large material-icons">mode_edit</i>
		                                                </div>
		                                                <h6>Dati personali</h6>
		                                            </div>
	                                        	</div>
		                                    	</div>
		                                	</div>
											<!--
		                                	
											-->
		                            	</div>
		                            </div>
		                        </div>

		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input id="prox" type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Prossimo' disabled/>
										
	                                    <input id="fine" type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Ricerca e modifica' disabled />
	                                </div>
	                                <div class="pull-left">
	                                    <input id="prec" type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Precedente' />
	                                </div>
		                            <div class="clearfix"></div>
		                        </div>
			                </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->

	    
	</div>

	
	
</body>
	<!--   Core JS Files   -->
	<script src="{{ url('/') }}/admin/ad_dashboard/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/admin/ad_dashboard/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/admin/ad_dashboard/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{ url('/') }}/admin/ad_dashboard/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{ url('/') }}/admin/ad_dashboard/js/jquery.validate.min.js"></script>
	<script>
		/*$(window).bind("pageshow", function() {
			document.getElementById('radioa').checked = false;
			document.getElementById('radioc').checked = false;
			alert('prova');
		});*/

		function exit(){
			window.location.href = '/';
		}
		function disabilita(){
			$("#prox").prop( "disabled", true );
		}
		function abilita(){
			$("#secondoStep").css("display", "inline");
			$("#prox").prop( "disabled", false );
		}
		function abilitaFine(){
			$("#fine").prop( "disabled", false );
		}
		function wrong(){
			alert("Devi fare una scelta!");
		}
		
	</script>
	
	

</html>
