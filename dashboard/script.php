<?php



include '../conn.php';


if(isset($_POST) && $_POST['funcao'] == 'excluir_tamanho'){
    $id = $_POST['id'];
    $conn->query("UPDATE `tamanhos` SET `situacao` = 1 WHERE `id` = '$id'");
    echo 'ok';
}

if(isset($_POST) && $_POST['funcao'] == 'excluir_cor'){
    $id = $_POST['id'];
    $conn->query("UPDATE `cores` SET `situacao` = 1 WHERE `id` = '$id'");
    echo 'ok';
}

if(isset($_POST) && $_POST['funcao'] == 'adicionar_tamanho_existente'){
    $cor_alvo = $_POST['cor_alvo'];
    $tamanho_novo = $_POST['tamanho_novo'];
    $quantidade_nova = $_POST['quantidade_nova'];
    $conn->query("INSERT INTO `tamanhos`( `tamanho`, `referencia`, `quantidade`) VALUES ('$tamanho_novo', '$cor_alvo', '$quantidade_nova')");
    echo 'ok';
}

if(isset($_POST) && $_POST['funcao'] === 'adicionar_cor_existente'){
    $referencia = rand(0, 999999);
    $nova_cor = $_POST['nova_cor'];  //Recebe o titulo cadastrado
    $refPasta = $_POST['id_produto'];

    $refCor = $conn->query("SELECT * FROM `produtos` WHERE `id` = '$refPasta' ORDER BY id DESC LIMIT 1");     //seleciona a última cor cadastrada
    $refCor = $refCor->fetch_array(MYSQLI_ASSOC);       //cria uma array associativo
    $pasta = $refCor['pasta'];     //variável para o id da cor

echo $pasta;



        $cor_UTF = $nova_cor;        // Recebe a cor que foi cadastrada

        $texto = $cor_UTF;
        
        $cadCor = time();       // Irá receber a cor em binário

        

        $pastaCor = $pasta . '/' . str_replace(' ', '_', $cadCor);  //cria uma pasta para cada cor cadastrada

        $conn->query("INSERT INTO `cores`( `cor`, `referencia`, `fotos`) VALUES ( '$cor_UTF', '$refPasta', '$pastaCor')");     //query para cadastrar a cor no banco de dados
        
        

        mkdir($pastaCor, 0700);         //cria uma pasta para as fotos da cor

        $arq = "arquivos";

        $controle = 0;      // variavel de flow control

        foreach( $_FILES[$arq]['name'] as $key){        
            /*
                Cadastra as imagens da cor na pasta
            */


            print_r($key);

            $dir = $pastaCor . '/';

            $uploadfile = $dir . $referencia . basename($key);

            move_uploaded_file($_FILES[$arq]['tmp_name'][$controle], $uploadfile);

            $controle++;

        }

        
    echo '<script> window.location.href="./mod_produto?p=2.2&pd=' . $refPasta . '" </script>';

        
}

if(isset($_POST) && $_POST['funcao'] == 'get_quantidade'){
    $id = $_POST['id'];
    $result = [];
    $query = $conn->query("SELECT * FROM `tamanhos` WHERE `id` = '$id'");
    while($result[] = $query->fetch_assoc())
    echo $result[0]['quantidade'] . "_" . $result[0]['tamanho'] ;
}


if(isset($_POST) && $_POST['funcao'] == 'alterar_tamanho'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $operacao = $_POST['operacao'];
    $valor = $_POST['valor'];
    print_r($_POST);
    if($operacao == 1){
        $query = $conn->query("UPDATE `tamanhos` SET `tamanho`='$nome',`quantidade` = `quantidade` + '$valor' WHERE `id` = '$id'");
    } else if($operacao == 2){
        $query = $conn->query("UPDATE `tamanhos` SET `tamanho`='$nome',`quantidade` = `quantidade` - '$valor' WHERE `id` = '$id'");
    }
}
















?>