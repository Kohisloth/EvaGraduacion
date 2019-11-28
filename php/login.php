<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>

	<title>Login</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/all.min.css">
	<script src="../js/jquery-3.4.1.min.js" ></script>

	<style>
	*{
    	margin: 0;
    	padding: 0;
    	border: 0;
	}
	body{
    	background: gray;
	}
		
	.fa-spin{
			display:none; 
	}
	.diseño {			
		
		}


	</style>

	<script>
		$(function(){
			$button =$("#btnIngresar");
			$spinner=("fa-spin");
			$button.on("click",function(evento){
				evento.preventDefault();
				$button.prop("disabled",true);
				$spinner.show();

				var v_usuario=$("#nombre").val();
				var v_password=$("#password").val();


				$.ajax({
					url:"vip.php",
					method:"POST",
					data:{
						nombre:v_usuario,
						password:v_password
					}
				});
				.done(function(informacion){
					console.log(informacion);
					$("#resultado").text(informacion);


				});

			});
		});
	</script>
</head>
<body>



	<section class="container-fluid" >
	<section class="row">
		<form action="vip.php" method="POST" class="diseño">
				<div class="col-md-12">
				<div class="form-group">
					<label for="">Usuario</label>
					<input type="text" name="nombre" class="form-control" id="nombre">
				</div>
				<div class="form-group">
					<label for="">Password</label>
					<input type="text" name="password" class="form-control" id="password">
				</div>
			</div>
			
			<div  class="form-group">
				<button class="btn btn-dark" id="btnIngresar">
					Ingresar
				</button></div>
				<i class="fas fa-spinner fa-spin"></i>
				<p class="text-danger" id="resultado"></p>
			</div>
		</section>
	</section>

</body>
</html>