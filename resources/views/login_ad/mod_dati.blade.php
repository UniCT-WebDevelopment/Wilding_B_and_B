
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
  <link href="{{ url('/') }}/admin/ad_dashboard/ad_info/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ url('/') }}/admin/ad_dashboard/ad_info/demo/demo.css" rel="stylesheet" />
  

  
  <style>

	.form-control, .is-focused .form-control {
		background-image: linear-gradient(to top, #b02727 2px, rgba(156, 39, 176, 0) 2px), linear-gradient(to top, #d2d2d2 1px, rgba(210, 210, 210, 0) 1px);
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
        <div class="container">
          <div class="row" >
            <div class="col-md-8">
              <div class="card " >
                <div class="card-header card-header">
                  <h4 class="card-title" >Ripielogo dell'utente {{$dati->nome}}</h4>
				  <hr>
                </div>
                <div class="card-body">
                  <form id="myForm" action="/login_ad/ins_data" method="post">
                  {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-5">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nome</label>
                          <input type="text" class="form-control" name="nome" value="{{$dati->nome}}" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Cognome</label>
                          <input type="text" class="form-control" name="cognome" value="{{$dati->cognome}}" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Codice Fiscale</label>
                          <input type="text" class="form-control" name="cod_fiscale" value="{{$dati->cod_fiscale}}"  />
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contatto</label>
                          <input type="text" class="form-control" name="contatto" value="{{$dati->contatto}}"  />
                        </div>
                      </div>
                    </div>
                    <br>
                    <input type="hidden" name="operazione" value="{{ $operazione }}"> 
                    <input type="hidden" name="old_email" value="{{$dati->email}}" />
                    <input type="hidden" name="utente" value="{{$utente}}"  />
                    <button id="ModificaUtente" class="btn btn-active btn-success pull-right" >Conferma Modifiche</button>         
                  </form>
                  <form action="/login_ad/lista_user" method="POST">
                  {{ csrf_field() }} 
                    <input type="hidden" name="operazione" value="{{ $operazione }}" /> 
                    <input type="hidden" name="utente" value="{{$utente}}"  />
                    <button id="esci"  class="btn btn-warning pull-right">Esci</button>
                  </form>
                  <form action="/login_ad/delete_user" method="POST">
                  {{ csrf_field() }} 
                    <input type="hidden" name="operazione" value="{{ $operazione }}"/> 
                    <input type="hidden" name="utente" value="{{$utente}}"  />
                    <input type="hidden" name="email" value="{{$dati->email}}" />
                    <button id="EliminaUtente"  class="btn btn-danger pull-right">Elimina l'utente</button>
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

		/*function modifica(){
			if($("#ModificaUtente").html() == "Conferma Modifiche"){
				$('#ModificaUtente').removeClass("btn btn-success pull-right").addClass("btn btn-active pull-right");
				$("#ModificaUtente").html("Modifica i dati");
				$('#myForm  input').prop("disabled",true);
        //document.getElementById("myForm").prepend(');
        document.getElementById("myForm").submit();
			}else{
				$('#myForm  input').prop("disabled",false);			
				$('#ModificaUtente').addClass("btn btn-success pull-right");
				$("#ModificaUtente").html("Conferma Modifiche");
			}
		};*/
	</script>

	
	
</body>

</html>
