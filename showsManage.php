<?php 
include_once ("header.php"); 
extract($_POST); 
if(isset($id)){
  $show = getShowsByID($link,$id);
}
?>
<form class="form-horizontal" action="./showsManageSave.php" method="post">
<legend>Cadastro de Espetáculo</legend>
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_user">Nome</label>  
  <div class="col-md-4">
  <input id="nome" name="nome" type="text" placeholder="Nome do espetáculo" class="form-control input-md" value="<?php if(isset($show["nome"])){ echo $show["nome"] ;} ?>" required="required">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="cod_user">Quantidade de poltronas</label>  
  <div class="col-md-4">
  <input id="qtd_poltronas" name="qtd_poltronas" type="text" placeholder="Quantidade de poltronas" class="form-control input-md numeric" value="<?php if(isset($show["qtd_poltronas"])){ echo $show["qtd_poltronas"] ;} ?>" required="required">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="salvar"></label>
  <div class="col-md-4">
    <input id="id" name="id" type="hidden" value="<?php if(isset($show["id"])){ echo $show["id"] ;} ?>">
    <button id="salvar" type="submit" name="salvar" class="btn btn-primary">Salvar</button>
  </div>
</div>
</form>
<?php include_once ("footer.php") ?>