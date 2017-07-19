<html>
	<head>
	<title>bnspoint</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript">
		if(location.protocol == "https:"){
			window.location.protocol="http";
		}
	</script>
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
		        <form role="form" class="form" id="point-form">
		        	<div class="row">
					  <div class="col-lg-12">
					    <div class="input-group">
					      <input type="text" id="username" name="username" class="form-control" placeholder="Karakter Adı" autocomplete="off">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="submit">Hesapla</button>
					      </span>
					    </div>
					  </div>
					</div>
		        </form>
		    </div>
		</div>
		<div class="col-md-12">
			<div class="list-group" id="suggest-list">
			</div>
		</div>
	</div>
</div>	
		<script type="text/javascript" src="/assets/plugins/jquery.min.js"></script>
		<script type="text/javascript" src="/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$("#point-form").submit(function(){
				location = "/"+$("#username").val();
				return false;
			});

			$("#username").on("keyup", function(){
				$("#suggest-list").html("");
				var query = $("#username").val();
				query = query.replaceAll(" ","");
				jQuery.ajax({
					url:"http://eu-search.ncsoft.com/openapi/suggest.jsp",
					dataType:"jsonp",
					data:{
						site:"bns",
						display:10,
						collection:"bnsusersuggest",
						query:query
					},
					success:function(data){
						for(i=0;i<data.front.length;i++){
							var username = data.front[i][0];
							$("#suggest-list").append('<a class="list-group-item" href="/'+username+'">'+username+'</a>');
						}
					}
				})
			});

			String.prototype.replaceAll = function(search, replacement) {
			    var target = this;
			    return target.replace(new RegExp(search, 'g'), replacement);
			};
		</script>
</body>
</html>