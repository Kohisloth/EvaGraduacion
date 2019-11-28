<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>salon</title>
	<script src="../js/jquery/dist/jquery.min.js"></script>
	<script src="../js/popper.js/dist/umd/popper.js"></script>
	<script src="../js/bootstrap/dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/all.min.css">
</head>
<style>

	img{
	width: 100%;
	height: 100px;
	}

	.salon{
		margin: 40px;
	}
	.silla-reservada{
		color: red;

	}
	.contenedor-mesa{
		margin: 5px;
		width: 150px;
		height: 150px;
		position: relative;
	}
	.mesa{
		font-size: 6em;
	}
	.silla{
		font-size: 1.5em;
		position: absolute;
		cursor: pointer;
	}
	.silla-pos1{
		top: -25px;
		left: 18px;
	}
	.silla-pos2{
		top: -25px;
		left: 56px;
	}
	.silla-pos3{
		top: 15px;
		left: 94px;
	}
	.silla-pos4{
		top: 56px;
		left: 94px;
	}
	.silla-pos5{
		top: 95px;
		left: 55px;
	}
	.silla-pos6{
		top: 95px;
		right:  115px;
	}
	.silla-pos7{
		top: 56px;
		right:  150px;
	}
	.silla-pos8{
		top: 15px;
		right:  150px;
	}

</style>
<body>
	<section class="salon">
		<?php
		include("procesar_plantillas.php");
		?>
		
	</section>
	<div class="fondo">
			<img src="../img/fondo.png"alt="">
		</div>

	<div class="modal" id="ventanaConfirmacion" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">confirmar reservacion</h5>
      </div>
      <div class="modal-body">
        <p>Confirma su reservacion?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCancelar">No</button>
        <button type="button" class="btn btn-primary" id="btnAceptar">Si</button>
      </div>
    </div>
  </div>
</div>
	<script>
		$(function(){
        $('.silla').tooltip();

        $('#ventanaConfirmacion').modal({show:false});

        $(".silla").on("click",function(){
            var reservada = $(this).hasClass("silla-reservada");

            if(!reservada){
                idSilla = $(this).data("id");
                $("#ventanaConfirmacion").modal("show");
            }
            else{

            }
        });
        $("#btnCancelar").on("click", function(){
            $("#ventanaConfirmacion").modal("hide");
        });

        $("#btnAceptar").on("click", function(){
            $.ajax({
                url:"confirmarReservacion.php",
                method: "POST",
                data:{
                    silla: idSilla
                }
            })
            .done(function(){

            });
        });
    });
	</script>
	
</body>

</html>