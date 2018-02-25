<?php 
include_once ("header.php");
$shows = getShows($link);
?>
<h1>Financeiro</h1>
<table class="table">
	<thead>
		<tr>
			<th scope="col">Espetáculo</th>
			<th scope="col">Poltronas Ocupadas</th>
			<th scope="col">Poltronas Disponíveis</th>
			<th scope="col">Arrecadação (R$ 23,76 por poltrona ocupada)</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($shows as $key => $show) { ?>
			<tr>
				<td><?php echo $show["nome"]; ?></td>
				<td><?php echo $show["poltronas_ocupadas"]; ?></td>
				<td><?php echo $show["poltronas_livres"]; ?></td>
				<td><?php echo arrecadacao($show["poltronas_ocupadas"]); ?></td>
			</tr>
		<?php }  ?>
	</tbody>
</table>
<?php include_once ("footer.php") ?>