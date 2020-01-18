<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Inserisci un nuovo annunccio</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/annuncio_assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="{{ url('/') }}/annuncio_assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	
	<link href="{{ url('/') }}/annuncio_assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="{{ url('/') }}/annuncio_assets/css/material-bootstrap-wizard.css" rel="stylesheet" />
	
	<link href="{{ url('/') }}/annuncio_assets/css/demo.css" rel="stylesheet" />
	

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
		.form-control{
			padding-top:15px;
			height: 38px;
		}

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
	</style>
</head>


<body>
	<div class="image-container set-full-height" style="background-image: url('{{ url('/') }}/annuncio_assets/img/wizard-city.jpg')">
	
	    <a href="{{ route('alb_dashboard',['user' => $data['email']]) }}">
	         <div class="logo-container ">
	              <i class="large material-icons">dashboard</i>
	            <div class="brand">
	                Torna alla dashboard
	            </div>
	        </div>
	    </a>
		

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-10 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="blue" id="wizard">
			                <form method="POST" action="/albergatore/ins_annuncio" enctype="multipart/form-data">
							{{ csrf_field() }}
								<input type="hidden" value="{{$data['email']}}" name="user" />

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Completa i seguenti campi
		                        	</h3>
									<h5>Inserisci le info necessarie per affittare il tuo appartamento</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#location" data-toggle="tab">Struttura </a></li>
			                            <li><a href="#fotografie" data-toggle="tab">Foto</a></li>
										<li><a href="#type" data-toggle="tab">Tipo affitto </a></li>
			                            <li><a href="#facilities" data-toggle="tab">Costo </a></li>
			                            <li><a href="#description" data-toggle="tab">
										Descrizione</a></li>
										
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h4 class="info-text">Informazioni sulla struttura</h4>
		                                	</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Città
													
													<span>
														<i class="material-icons">location_city</i>
													</span>
													
													</label>
		                                        	<input  type="text" class="form-control" id="exampleInputEmail1" name="citta" required>
													
												</div>
		                                	</div>
											<div class="col-sm-5 ">
		                                    	<div class="form-group label-floating">
		                                            <label class="control-label">Indirizzo
														<span>
															<i class="material-icons">location_on</i>
														</span>
													</label>
	                                            	<input  type="text" class="form-control" id="exampleInputEmail1" name="indirizzo" required>
	                                        	</div>
		                                	</div>
											
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
													
												
		                                            <label class="control-label">Tipologia struttura
													<span>
														<i class="material-icons">home</i>
													</span>
													</label>
	                                            	<select  name="bagno" class="form-control">
	                                                	<option disabled="" selected=""></option>
	                                                	<option value="Si"> Casa singola </option>
	                                                	<option value="Condiviso"> Stanza in appartamento </option>
	                                            	</select>
	                                        	</div>
		                                	</div>
		                                	<div class="col-sm-5">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Persone ammesse
													<span>
														<i class="material-icons">person_add</i>
													</span>
													</label>
		                                        	<select  name="persone" class="form-control" >
		                                            	<option disabled="" selected=""></option>
		                                            	<option>1  Persona</option>
		                                            	<option>2  Persona </option>
		                                            	<option>3  Persone</option>
		                                            	<option>4  Persone</option>
		                                            	<option>5  Persone</option>
		                                            	<option>6+ Persone</option>
		                                        	</select>
		                                    	</div>
		                                	</div>
											
												<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Stanze
														<span>
															<i class="material-icons">hotel</i>
														</span>
													</label>
													
		                                        	<select  name="stanze" class="form-control" >
		                                            	
														<option disabled="" selected=""></option>
		                                            	<option>1</option>
		                                            	<option>2</option>
		                                            	<option>3</option>
		                                            	<option>4</option>
		                                            	<option>5</option>
		                                            	<option>6</option>
		                                        	</select>
		                                    	</div>
		                                	</div>
											<div class="col-sm-5 ">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Nome casa</label>
		                                        	<input  type="text" class="form-control" id="exampleInputEmail1" name="nome">
												</div>
		                                	</div>
											
											<!--
		                                	
											-->
		                            	</div>
		                            </div>
									
									<div class="tab-pane container" id="fotografie"> 
															
									  <div class="row" style="overflow-x:hidden; width:80%;margin-top:-50px; padding:0px;">
									   <h4 class="info-text">Carica fino ad un max di 8 foto per il tuo annuncio</h4>
										
										<div class="row">
										  <div class="col-md-6" id="contenitoreInput">
											  <label id="labelInput">
											  <i class="large material-icons">cloud_upload</i>&nbsp Clicca qui per caricare le tue foto 
												  <input   type="file" class="form-control" id="images" name="file[]" onchange="preview_images();"accept="image/*" multiple/>
											  </label>
										  </div>
										
										 
										 </div>
										 <div class="row" id="image_preview">
										 
										 
										 </div>
										
										
										
									  </div>

									</div>
									<!-- FINE CONTENITORE FOTO -->
									
		                            <div class="tab-pane" id="type">
		                                <h4 class="info-text">Che tipo di appartamento affitto vuoi disporre?</h4>
		                               <div class="tab-pane" id="captain">
		                                
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Seleziona questo per un affitto esclusivamente ad ore" onclick="enableTime()"/>
		                                                <input type="radio" name="type" value="ore" >
		                                                <div class="icon">
		                                                    <i class="material-icons">access_time</i>
		                                                </div>
		                                                <h6>Ore</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Seleziona questo per un affitto esclusivamente giornaliero" onclick="enableDaily()">
		                                                <input type="radio" name="type" value="giorno"  />
		                                                <div class="icon">
		                                                    <i class="material-icons">today</i>
		                                                </div>
		                                                <h6>Giornaliero</h6>
		                                            </div>
		                                        </div>
												<!--<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Seleziona questo per affittare sia a giorno che ad ore" onclick="enableBoth();">
		                                                <input type="radio" name="type" value="Code" />
		                                                <div class="icon">
		                                                    <i class="material-icons">date_range</i>
		                                                </div>
		                                                <h6>Entrambi i metodi</h6>
		                                            </div>
		                                        </div>-->
		                                    </div>
		                                </div>
		                            </div>
									</div>
		                            <div class="tab-pane" id="facilities">
		                                <h4 class="info-text">Prezzi e servizi offerti</h4>
		                                <div class="row">
										<!-- PREZZO GIORNALIERO-->
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                      <div class="form-group label-floating">
		                                        	<label class="control-label">Prezzo giornaliero</label>
		                                        	<div class="input-group" >
		                                            	<input id="affittoGiornaliero"  name="euro" type="number" min="10" step="01.00" class="form-control" >
		                                            	<span class="input-group-addon">€</span>
		                                        	</div>
		                                    	</div>
		                                    </div>
											
											<!-- PREZZO ORARIO-->
		                                    <div class="col-sm-6">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Prezzo orario</label>
		                                        	<div class="input-group">
		                                            	<input id="affittoOrario"  name="euro" type="number" min="10" step="01.00" class="form-control">
		                                            	<span class="input-group-addon">€</span>
		                                        	</div>
		                                    	</div>
		                                    </div>
		                                    <div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Il WiFi è incluso?
													<span>
														<i class="material-icons">wifi</i>
													</span>
													</label>
													
		                                        	<select class="form-control" >
		                                    			<option disabled="" selected=""></option>
		                                            	<option>Si</option>
		                                            	<option>No</option>
		                                        	</select>
		                                    	</div>
		                                    </div>
		                                    <div class="col-sm-6">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">La colazione inclusa?
													<span>
														<i class="material-icons">free_breakfast</i>
													</span>
													</label>
		                                        	<select class="form-control" >
		                                            	<option disabled="" selected=""></option>
		                                            	<option>Si</option>
		                                            	<option>No </option>
														<option>A richiesta</option>
		                                        	</select>
		                                    	</div>
	                                    	</div>
											 <div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Fumo
													<span>
														<i class="material-icons">smoking_rooms</i>
													</span>
													</label>
		                                        	<select class="form-control" >
		                                    			<option disabled="" selected=""></option>
		                                            	<option>Si</option>
		                                            	<option>No</option>
		                                        	</select>
		                                    	</div>
		                                    </div>
											  <div class="col-sm-6">
		                                    	<div class="form-group label-floating">
		                                        	<label class="control-label">Animali
													<i class="material-icons">pets</i>
													</label>
		                                        	<select class="form-control" >
		                                            	<option disabled="" selected=""></option>
		                                            	<option>Amessi</option>
		                                            	<option>Non ammessi</option>
													
		                                        	</select>
		                                    	</div>
	                                    	</div>
		                                </div>
		                            </div>
		                            <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <h4 class="info-text"> Inserisci una breve descrizione della casa</h4>
		                                    <div class="col-sm-6 col-sm-offset-1">
		                                        <div class="form-group label-floating">
		                                            <label class="control-label">Qui la descrizione</label>
		                                            <textarea class="form-control" placeholder="" rows="9"
													name = "descrizione" ></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-4">
		                                    	<div class="form-group label-floating">
		                                            <label class="control-label">Esempio</label>
		                                            <p  class="description">"Posto perfetto per godersi in relax il paesaggio. All'arrivo l'host ti accoglie di persona!"</p>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
									
		                        </div>
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Prossimo' />
										
	                                    <input type='submit' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='Fine' />
	                                </div>
	                                <div class="pull-left">
	                                    <input type='button' class='btn btn-previous btn-fill btn-info btn-wd' name='previous' value='Precedente' />
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
	<script src="{{ url('/') }}/annuncio_assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/annuncio_assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="{{ url('/') }}/annuncio_assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{ url('/') }}/annuncio_assets/js/material-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{ url('/') }}/annuncio_assets/js/jquery.validate.min.js"></script>
	<script>
	
	//Gestione e disabilitazione Prezzo Giornaliero/Orario
	function enableDaily(){
		//alert("calling enableDaily");
		$("#affittoGiornaliero").prop('disabled', false);
		$("#affittoOrario").prop('disabled', true);
	}
	function enableTime(){
		//alert("calling enableTime");
		$("#affittoGiornaliero").prop('disabled', true);
		$("#affittoOrario").prop('disabled', false);
	}
	function enableBoth(){
		//alert("calling enableBoth");
		$("#affittoGiornaliero").prop('disabled', false);
		$("#affittoOrario").prop('disabled', false);
	}
		

	 $('#add_more').click(function() {
          "use strict";
          $(this).before($("<div/>", {
            id: 'filediv'
          }).fadeIn('slow').append(
            $("<input/>", {
              name: 'file[]',
              type: 'file',
              id: 'file',
              multiple: 'multiple',
              accept: 'image/*'
            })
          ));
        });

        $('#upload').click(function(e) {
          "use strict";
          e.preventDefault();

          if (window.filesToUpload.length === 0 || typeof window.filesToUpload === "undefined") {
            alert("No files are selected.");
            return false;
          }

        
        });

        deletePreview = function (ele, i) {
          "use strict";
          try {
            $(ele).parent().remove();
            window.filesToUpload.splice(i, 1);
          } catch (e) {
            console.log(e.message);
          }
        }

        $("#file").on('change', function() {
          "use strict";

          // create an empty array for the files to reside.
          window.filesToUpload = [];

          if (this.files.length >= 1) {
            $("[id^=previewImg]").remove();
            $.each(this.files, function(i, img) {
              var reader = new FileReader(),
                newElement = $("<div id='previewImg" + i + "' class='previewBox'><img /></div>"),
                deleteBtn = $("<span class='delete' onClick='deletePreview(this, " + i + ")'>X</span>").prependTo(newElement),
                preview = newElement.find("img");

              reader.onloadend = function() {
                preview.attr("src", reader.result);
                preview.attr("alt", img.name);
              };

              try {
                window.filesToUpload.push(document.getElementById("file").files[i]);
              } catch (e) {
                console.log(e.message);
              }

              if (img) {
                reader.readAsDataURL(img);
              } else {
                preview.src = "";
              }

              newElement.appendTo("#filediv");
            });
          }
        });
	
	</script>
	
	

</html>
