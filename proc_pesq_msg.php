<?php
include_once './conexao.php';

$assunto = filter_input(INPUT_GET, 'term', FILTER_SANITIZE_STRING);

//SQL para selecionar os registros
$result_msg_cont = "SELECT titulo FROM produtos WHERE titulo LIKE '%$assunto%' ORDER BY id ASC LIMIT 7";

//Seleciona os registros
$resultado_msg_cont = $conn->query($result_msg_cont);
// $resultado_msg_cont->execute();

while($row_msg_cont = $resultado_msg_cont->fetch_assoc()){
    $data[] = $row_msg_cont['titulo'];
}

echo json_encode($data);