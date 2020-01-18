
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/') }}/admin/ad_dashboard/ad_info/img/apple-icon.png">
  <link rel="icon" type="image/png" href="{{ url('/') }}/admin/ad_dashboard/ad_info/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Modifica i dati personali
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  
  
   <!-- CSS Files -->
   <link href="{{ url('/') }}/client_assets/css/jquery.timepicker.css" rel="stylesheet" />
  <link href="{{ url('/') }}/admin/ad_dashboard/ad_info/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('/') }}/admin/ad_dashboard/ad_info/demo/demo.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  

  
  <style>

	.form-control, .is-focused .form-control {
		background-image: linear-gradient(to top, #b02727 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
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
		.wizard-card[data-color="black"] .moving-tab {
			background-color: black;
		}
		
		body {
 
		background-repeat: no-repeat;
		width:100%;
		height:100%;
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		
	}
  </style>
  
</head>

<body class="image-container set-full-height" style="background-image: url('https://cdn.pixabay.com/photo/2014/10/03/17/16/gear-472000_960_720.jpg')">

  <div class="wrapper">
    <div class="main-panel">
	
      <div class="content" >
	  
        <div class="container ">
          <div class="row" >
            <div class="col-md-8">
               <div class="card " >
                <div class="card-header card-header">
                  <h4 class="card-title" >Ripielogo Annuncio</h4>
				  <hr>
                </div>
                <div class="card-body " >
                  <form id="subForm" action="/login_ad/new_data" method="post">
				  {{ csrf_field() }}
                    @if($utente == "cliente")
					<div class="row">
						  <div class="col-md-6">
                       <label class="bmd-label-floating">Nome casa</label>
                          <input type="text" class="form-control" value= "{{  $record->nome_casa }}" disabled/>
                      </div>
					  <hr>
					   <div class="col-md-6">
                       
                          <label class="bmd-label-floating">Indirizzo</label>
                          <input type="text" class="form-control" value= "{{  $record->citta .' '.$record->indirizzo_civico }}" disabled/>
                      
                      </div>
					   <div class="col-md-6">
                       
                          <label class="bmd-label-floating">Tipologia_affitto</label>
                          <input type="text" class="form-control" value= "{{  $record->tipologia_affitto }}" disabled/>
                      
                      </div>
                      <div class="col-md-3">
                          <label class="bmd-label-floating">check-in </label>
						  <input id="datepickerIn" class="datepicker" type="text" name="checkIn" value= "{{ substr($record->data_inizio,0,10) }}" >
						  @if($record->tipologia_affitto == 'ore')
						  	<br><br>
						  	<input id="timepickerIn" class="timepicker" type="text" name="in_time" value= "{{ substr($record->data_inizio,11,16) }}">
						  @endif
                      </div>
					  <div class="col-md-6">
                          <label class="bmd-label-floating">check-out </label>
						  <br>
                          @if($record->tipologia_affitto == 'ore')
						  	<input id="timepickerOut" class="timepicker" type="text" name="ou_time" value= "{{ substr($record->data_fine,11,16) }}">
						  @else
						  	<input id="datepickerOut" class="datepicker" type="text" name="checkOut" value= "{{ substr($record->data_fine,0,10) }}" >
						  @endif
                      </div>
					@else   
					<div class="row">
						  <div class="col-md-6">
                       <label class="bmd-label-floating">Nome casa</label>
                          <input type="text" class="form-control" name="nome_casa" value= "{{  $record->nome_casa }}" />
                      </div>
					  <hr>
					   <div class="col-md-6">
                       
                          <label class="bmd-label-floating">Città</label>
                          <input type="text" class="form-control" name="citta" value= "{{  $record->citta }}" />
                      
                      </div>
					  <div class="col-md-6">
					   <label class="bmd-label-floating">Indirizzo</label>
					   <input type="text" class="form-control" name="indirizzo" value= "{{  $record->indirizzo_civico }}" />
				  	 </div>
					   <div class="col-md-6">
					   		<label class="bmd-label-floating">Numero stanze</label>
					   		<input type="text" class="form-control" name="num_stanze" value= "{{  $record->num_stanze }}" />
				  	 	</div>
					   <div class="col-md-6">
                          <label class="bmd-label-floating">Tipologia_affitto</label>
                          <!--<input type="text" class="form-control" value= "{{  $record->tipologia_affitto }}" />-->
						  <br>
						  <select name="tipologia_affitto">
						  	<option value= "{{  $record->tipologia_affitto }}"> {{  $record->tipologia_affitto }} </optio>
							@if($record->tipologia_affitto == 'giorno')
								<option value= "ore"> ore </optio>
							@else
								<option value= "giorno"> giorno </optio>
							@endif
						   </select>
                      	</div>
						<div class="col-md-6">
					   		<label class="bmd-label-floating">Prezzo giorno</label>
					   		<input type="text" class="form-control" name="prezzo_giorno" value= "{{  $record->prezzo_giorno }}" />
				  	 	</div>
					   <div class="col-md-6">
					   		<label class="bmd-label-floating">Prezzo ora</label>
					   		<input type="text" class="form-control" name="prezzo_ore" value= "{{  $record->prezzo_ora }}" />
				  	 	</div>
						<div class="col-md-6">
					   		<label class="bmd-label-floating">Regolamento</label>
					   		<input type="text" class="form-control" name="regolamento" value= "{{  $record->regolamento }}" />
				  	 	</div>
						    
                    @endif
					<input type="hidden" name="record" value="{{ serialize($record) }}">
					<input type="hidden" name="operazione" value="{{ $operazione }}" /> 
                    <input type="hidden" name="utente" value="{{$utente}}"  />
					<input type="hidden" name="user" value="{{$user}}"  />
                    </div>
					<br>
                  </form>
				  @if($utente == "cliente")
				  	<button id="ModificaUtente" class="btn btn-success pull-right" onclick="mySubmit()">Modifica i dati</button>
				  @else
				  	<button id="ModificaUtente" class="btn btn-success pull-right" onclick="albSubmit()">Modifica i dati</button>
				  @endif

                  <form action="/login_ad/lista_inserzione" method="POST">
                  {{ csrf_field() }} 
                    <input type="hidden" name="operazione" value="{{ $operazione }}" /> 
                    <input type="hidden" name="utente" value="{{$utente}}"  />
					<input type="hidden" name="user" value="{{$user}}"  />
                    <button id="esci"  class="btn btn-warning pull-right">Esci</button>
                  </form>
				  <form action="/login_ad/delete_inserzione" method="POST">
				  {{ csrf_field() }}
				  	<input type="hidden" name="record" value="{{ serialize($record) }}">
                    <input type="hidden" name="operazione" value="{{ $operazione }}" /> 
                    <input type="hidden" name="utente" value="{{$utente}}"  />
					<input type="hidden" name="user" value="{{$user}}"  />
					<button id="EliminaUtente"  class="btn btn-danger pull-right">Elimina</button>
				  </form>  
				</div>
              </div>
			</div>
         </div>
		</div>
      </div>
     
    </div>
  </div>
  
  <!--   Core JS Files   -->
	
	<script src="{{ url('/') }}/admin/ad_dashboard/ad_info/js/core/jquery.min.js"></script>
	<script src="{{ url('/') }}/admin/ad_dashboard/ad_info/js/core/popper.min.js"></script>
	<script src="{{ url('/') }}/admin/ad_dashboard/ad_info/js/core/bootstrap-material-design.min.js"></script>
	<script src="{{ url('/') }}/admin/ad_dashboard/ad_info/js/plugins/perfect-scrollbar.jquery.min.js"></script>
	
	 <script>
	$(document).ready(function(){
		var json = @json($date_pik);
		var dateRange= [];
		for(var k in json){
			for (var d = new Date(json[k]['data_inizio']); d <= new Date(json[k]['data_fine']); d.setDate(d.getDate() + 1)) {
				dateRange.push($.datepicker.formatDate('yy-mm-dd', d));
			}
		}

		$( ".datepicker" ).datepicker({
			dateFormat: 'yy-mm-dd',
			beforeShowDay: function(date){
				var range = jQuery.datepicker.formatDate('yy-mm-dd', date);
				return [ dateRange.indexOf(range) == -1 ]
			}
		});

		$('.timepicker').timepicker({
			timeFormat: 'H:i',
			startTime: '00:00',
			step: '60',
			dynamic: false,
			dropdown: true,
			scrollbar: true ,
		});
	});

	function mySubmit(){
		var jtype=@json($record);
		if (jtype['tipologia_affitto'] == "giorno"){
			var checkIn= new Date($("input[name='checkIn']").val());
			var checkOut= new Date($("input[name='checkOut']").val());
		}else{
			var checkIn= new Date($("input[name='checkIn']").val());
			var checkOut= new Date($("input[name='checkIn']").val());
			var in_time = $("input[name='in_time']").val();
			var ou_time = $("input[name='ou_time']").val();
			if(in_time !='' && ou_time !=''){
				checkIn.setHours(in_time.substring(0, 2), in_time.substring(3, 5));
				checkOut.setHours(ou_time.substring(0, 2), ou_time.substring(3, 5));
			}
		}
		var d = new Date();
		if(isNaN(checkIn.valueOf()) || isNaN(checkOut.valueOf()) || (checkIn.getTime() < d.getTime()) || (checkIn.getTime() >= checkOut.getTime())){
				alert('Range checkIn checkOut non valido');
		}else{
			$('#subForm').submit();
		}
	};

	function albSubmit(){
		$('#subForm').submit();
	};
  </script>
	
	
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css" rel="stylesheet"/>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.10.0/jquery.timepicker.css" rel="stylesheet"/>

			
	
	
	
	
</body>

</html>
