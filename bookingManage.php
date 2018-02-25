<?php 
include_once ("header.php"); 
extract($_POST); 
?>
<form class="form-horizontal" action="./bookingManageSave.php" method="post">
<legend>Solicitação de Reserva</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_user">Espetáculo</label>  
  <div class="col-md-4">
  	<select id="espetaculo" name="id_espetaculo" class="form-control input-md" required="required">
  		<?php 
  			$shows = getShows($link);
  			foreach($shows as $key => $show){ ?>
  				<option value="<?php echo $show["id"]; ?>" <?php if(isset($id_espetaculo) && $id_espetaculo == $show["id"]) { echo 'selected="selected"'; } ?>><?php echo $show["nome"]; ?></option>
  			<?php }	
  		?>
  	</select>
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_user">Cliente</label>  
  <div class="col-md-4">
  <input id="cliente" name="cliente" type="text" placeholder="Nome do Cliente" class="form-control input-md" value="" required="required">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="salvar"></label>
  <div class="col-md-4">
    <input id="id" name="id" type="hidden" value="<?php if(isset($reserva["id"])){ echo $reserva["id"] ;} ?>">
    <button id="salvar" type="submit" name="salvar" class="btn btn-primary">Salvar</button>
  </div>
</div>
</form>
<?php include_once ("footer.php"); ?>