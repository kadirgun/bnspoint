<html>
	<head>
	<title>bnspoint</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/assets/plugins/bootstrap/css/bootstrap.min.css">
</head>
	<body>
		<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
   
  </div><!-- /.container-fluid -->
</nav>		<div class="container">
	<div class="page-header"> <h1>Blade & Soul <small> Puan Hesaplama</small></h1> </div>
	<div class="row">
		<div class="col-md-12">
		    <div class="well text-center">
		        <form role="form" class="form number-form" id="point-form">
		        	<div class="row">
					  <div class="col-lg-12">
					    <div class="input-group">
					      <input type="text" id="username" name="username" class="form-control" placeholder="Karakter Adı">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="submit">Hesapla</button>
					      </span>
					    </div>
					  </div>
					</div>
		        </form>
		    </div>
		</div>
	</div>
</div>	
		<script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="/assets/js/main.js"></script>
		<script type="text/javascript">
			$("#point-form").submit(function(){
				location = "/"+$("#username").val();
				return false;
			})
		</script>
</body>
</html>