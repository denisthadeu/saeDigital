<?php 
	include_once ("header.php");
	$reservas = getBooking($link);
?>
<div class="container">
	<div class="row">
		<div class="col-md-10">
		    <h1>Reservas</h1>   
		</div>
		<div class="col-md-2">
			<a href="./bookingManage.php" class="btn btn-primary">
			  	<button type="submit" class="btn btn-primary" value="editar">
			  		<span>Criar</span>
				</button>
			</a>
		</div>
	</div>
</div>
<?php if(isset($_REQUEST["msg"])) {echo "<p>".$_REQUEST["msg"]."</p>"; }?>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Espetáculo</th>
			<th scope="col">Cliente</th>
			<th scope="col">Código</th>
			<th scope="col">Status</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($reservas as $key => $reserva) { ?>
			<tr>
				<td><?php echo $reserva["nome"]; ?></td>
				<td><?php echo $reserva["cliente"]; ?></td>
				<td><?php echo $reserva["codigo_reserva"]; ?></td>
				<td><?php echo statusBooking($reserva["status"]); ?></td>
				<th scope="row">
					<?php if($reserva["status"] == 1) { ?>
						<form action="./bookingManageCancel.php" method="post" onsubmit="return functionCancel();">
							<input type="hidden" name="id" value="<?php echo $reserva["id"]; ?>">
							<button type="submit" class="btn btn-danger" value="Cancelar" ">
							  	<span>Cancelar</span>
							</button>
						</form>
					<?php }  ?>
				</th>
			</tr>
		<?php }  ?>
	</tbody>
</table>

<?php include_once ("footer.php") ?>