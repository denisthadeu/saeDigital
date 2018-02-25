<?php 
	include_once ("header.php");
	$shows = getShows($link);
?>
<div class="container">
	<div class="row">
		<div class="col-md-10">
		    <h1>Espetáculos</h1>   
		</div>
		<div class="col-md-2">
			<a href="./showsManage.php" class="btn btn-primary">
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
			<th scope="col">Poltronas Total</th>
			<th scope="col">Poltronas Ocupadas</th>
			<th scope="col">Poltronas Disponíveis</th>
			<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($shows as $key => $show) { ?>
			<tr>
				<td><?php echo $show["nome"]; ?></td>
				<td><?php echo $show["qtd_poltronas"]; ?></td>
				<td><?php echo $show["poltronas_ocupadas"]; ?></td>
				<td><?php echo $show["poltronas_livres"]; ?></td>
				<th scope="row">
					<div class="row">
						<div class="col-md-3">
							<form action="./showsManage.php" method="post">
								<input type="hidden" name="id" value="<?php echo $show["id"]; ?>">
								<button type="submit" class="btn btn-primary" value="editar">
								  	<span>Editar</span>
								</button>
							</form>
						</div>
						<div class="col-md-4">
							<form action="./bookingManage.php" method="post">
								<input type="hidden" name="id_espetaculo" value="<?php echo $show["id"]; ?>">
								<button type="submit" class="btn btn-info" value="Reservar">
								  	<span>Reservar</span>
								</button>
							</form>
						</div>
						<div class="col-md-4">
							<form action="./showsManageDelete.php" method="post" onsubmit="return functionDelete();">
								<input type="hidden" name="id" value="<?php echo $show["id"]; ?>">
								<button type="submit" class="btn btn-danger" value="Excluir" ">
								  	<span>Excluir</span>
								</button>
							</form>
						</div>		
					</div>
				</th>
			</tr>
		<?php }  ?>
	</tbody>
</table>

<?php include_once ("footer.php") ?>