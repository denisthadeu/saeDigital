<?php 
/******************************************* funções do espetaculo *************************************************/
function getShows($mysqli){ // função feita para pegar todos os espetaculos cadastrados e pegar totsl ocupado
	$sql = "SELECT * FROM `espetaculos` Order By `espetaculos`.nome";
	$results = $mysqli->query($sql);
	$rows = array();
	while($row = $results->fetch_array()){
		$row["poltronas_ocupadas"] = getBookingByShow($mysqli,$row["id"]);
		$row["poltronas_livres"] =  $row["qtd_poltronas"]- $row["poltronas_ocupadas"];
		$rows[] = $row;
	}
	return $rows;
}

function getShowsByID($mysqli, $id){ // função feita parapegar um show especifico (usado na função de editar)
	$sql = "SELECT * FROM `espetaculos` WHERE ID = '".$id."'";
	$results = $mysqli->query($sql);
	$arr = $results->fetch_array();
	$arr["poltronas_ocupadas"] = getBookingByShow($mysqli,$arr["id"]);
	$arr["poltronas_livres"] =  $arr["qtd_poltronas"]- $arr["poltronas_ocupadas"];
	return $arr;
}

function showSave($mysqli, $id, $nome, $qtd_poltronas){ // Função para salvar ou editar um espetaculo
	if(empty($id)){
		$sql = "INSERT INTO `espetaculos` (nome, qtd_poltronas) VALUES ('".$nome."', '".$qtd_poltronas."');";
		if ($mysqli->query($sql) === TRUE) {
		    $msg = '<div class="p-3 mb-2 bg-success text-white">O espetáculo '.$nome.' foi criado com sucesso</div>';
		} else {
		    $msg = '<div class="p-3 mb-2 bg-danger text-white">Erro ao cadastrar espetáculo. ' . $sql . '<br>' . $conn->error.'</div>';
		}
	} else {
		$sql = "UPDATE `espetaculos` SET nome='".$nome."', qtd_poltronas='".$qtd_poltronas."' WHERE id = '".$id."';";
		if ($mysqli->query($sql) === TRUE) {
		    $msg = '<div class="p-3 mb-2 bg-success text-white">O espetáculo '.$nome.' foi atualizado com sucesso</div>';
		} else {
		    $msg = '<div class="p-3 mb-2 bg-danger text-white">Erro ao atualizar espetáculo. ' . $sql . '<br>' . $conn->error.'</div>';
		}
	}
	return $msg;
}

function deleteShowByID($mysqli, $id){ // função para deletar um espetaculo
	$sql = "DELETE FROM `espetaculos` WHERE id = '".$id."';";
	if (empty($id)) {
		$msg = '<div class="p-3 mb-2 bg-danger text-white">Erro: espetáculo não encontrado</div>';
	} elseif($mysqli->query($sql) === TRUE) {
	    $msg = '<div class="p-3 mb-2 bg-success text-white">O espetáculo foi excluído com sucesso</div>';
	} else {
	    $msg = '<div class="p-3 mb-2 bg-danger text-white">Não é possível excluir um espetáculo que já possui reservas (Ativas ou canceladas)</div>';
	}
	return $msg;
}



/******************************************* funções da Reserva ***************************************************/



function getBooking($mysqli){ // função para pegar todas as reserva (ativas e canceladas)
	$sql = "SELECT `reservas`.id as id, `reservas`.id_espetaculo, `reservas`.cliente, `reservas`.codigo_reserva, `reservas`.status, `espetaculos`.nome as nome FROM `reservas` INNER JOIN `espetaculos` ON `reservas`.`id_espetaculo`=`espetaculos`.`id` Order By `reservas`.id DESC";
	$results = $mysqli->query($sql);
	$rows = array();
	while($row = $results->fetch_array()){
		$rows[] = $row;
	}
	return $rows;
}

function getBookingByID($mysqli, $id){ // função para pegar uma reserva especifica pelo id
	$sql = "SELECT * FROM `reservas` WHERE ID = '".$id."'";
	$results = $mysqli->query($sql);
	$arr = $results->fetch_array();
	return $arr;
}

function bookingSave($mysqli, $id_espetaculo, $cliente){ // função para salvar (tem tem opção de editar)
	//verifica se possui poltronas livres no espetaculo
	$show = getShowsByID($mysqli,$id_espetaculo);
	if(!empty($show["poltronas_livres"])){
		$codigo_reserva = generateShortCode();
		$sql = "INSERT INTO `reservas` (id_espetaculo, cliente , codigo_reserva) VALUES ('".$id_espetaculo."', '".$cliente."', '".$codigo_reserva."');";
		if ($mysqli->query($sql) === TRUE) {
		    $msg = '<div class="p-3 mb-2 bg-success text-white">A reserva do(a) '.$cliente.' foi feita com sucesso</div>';
		} else {
		    $msg = '<div class="p-3 mb-2 bg-danger text-white">Erro ao cadastrar reserva. ' . $sql . '<br>' . $conn->error.'</div>';
		}
	} else {
		$msg = '<div class="p-3 mb-2 bg-danger text-white">Este espetáculo não possui mais poltronas disponíveis</div>';
	}
	return $msg;
}

function cancelBookingByID($mysqli, $id){ // função para cancelar uma reserva
	$sql = "UPDATE `reservas` SET status='0' WHERE id = '".$id."';";
	if (empty($id)) {
		$msg = '<div class="p-3 mb-2 bg-danger text-white">Erro: Reserva não encontrada</div>';
	} elseif($mysqli->query($sql) === TRUE) {
	    $msg = '<div class="p-3 mb-2 bg-success text-white">A reserva foi cancelada com sucesso</div>';
	} else {
	    $msg = '<div class="p-3 mb-2 bg-danger text-white">Erro ao deletar espetáculo. ' . $sql . '<br>' . $conn->error.'</div>';
	}
	return $msg;
}

function generateShortCode(){ // função para gerar um pequeno código para a reserva
	$value = date("Y-m-d h:m:s");
	return crc32($value);
}

function statusBooking($status){// código para nomear os status da reserva
	if(!empty($status)){
		return "Ativo";
	} else {
		return "Cancelado";
	}
}

function getBookingByShow($mysqli,$id_espetaculo){ // pegar a qtd de poltrona ocupadas por id de espetaculo
	$sql = "SELECT count(*) as total from `reservas` where `reservas`.`id_espetaculo`='".$id_espetaculo."' AND `reservas`.`status`='1'";
	$results = $mysqli->query($sql);
	$arr = $results->fetch_array();
	return $arr["total"];
}


/******************************************* funções do financeiro ***************************************************/

function arrecadacao($qtd_poltronas_ocupadas){
	$vlr_por_poltrona = 23.76;
	$total = $qtd_poltronas_ocupadas * $vlr_por_poltrona;
	return 'R$ ' . number_format($total, 2, ',', '.');
}


?>