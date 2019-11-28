<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>compras</title>
	<link rel="stylesheet" href="../css/bootstrap.css">
	<script src="../js/jquery-3.4.1.min.js" ></script>
	<script src="../js/bootstrap.min.js"></script>
</head>
<script>
	$(function(){
		var $paquetes= $("#paquete1 , #paquete2 , #paquete3");
		$paquetes.on("change", function(){
			var lugares= $(this).val();
			var precio= $(this).attr("data-precio");
			var total= lugares*precio;
			$(this).next("p").text("$"+total);
		});

		$("#modalConfirmar").modal({
					show:false
		
				});

				$("#btnConfirmar").on("click",function(){
					var total =0;

					$("#modalConfirmar").modal("show");
					$paquetes.each(function(){
						var numero=$(this).val();
						var $precioCaja = $(this);
						var precio = $precioCaja.attr("data-precio")*numero;

						total = total + parseInt(precio);
					});

					$("#precioFinal").text("El total es:$"+total);
				});

				$("#btnAceptar").on("click",function(){
					$btn =$(this);
					$btn.prop("disabled",true);

					var lugaresPaquete1= $("#paquete1").val();
					var lugaresPaquete2= $("#paquete2").val();
					var lugaresPaquete3= $("#paquete3").val();

					$.ajax({
						url:"comprar.php",
						method:"POST",
						data:{
							paquete1:lugaresPaquete1,
							paquete2:lugaresPaquete2,
							paquete3:lugaresPaquete3,

						}
					})
					.done(function(){
						$btn.prop("disabled",false);
						$("#modalConfirmar").modal("hide");
					});
				});
		});		     
</script>
<style>
	div{
		display: inline-table;
	}
</style>

<body>
	<div>
		<img src="" alt="">
		<input type="number"  value="0" name="" min="0" max="10" id="paquete1" data-precio = "100"/>
		<p>$0</p>
	</div>
	<div id="img">
		<img src=""  alt="">
		<input type="number" name="" value="0" min="0" max="10" id="paquete2" data-precio = "500"/>
		<p>$0</p>
	</div>
	<div>
		<img src="" alt="">
		<input type="number" name="" value="0" min="0" max="10" id="paquete3" data-precio = "1000"/>
		<p>$0</p>
	</div>
	<br>
	<button type="button" id="btnConfirmar" class="btn btn-dark">comprar</button>

	<div class="modal fade" id="modalConfirmar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">confirmar compras</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea confirmar su seleccion? </p>
        <p id="precioFinal"></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" id="btnAceptar" class="btn btn-primary">Aceptar</button>
      </div>
    </div>
  </div>
</div>


</body>
</html>

