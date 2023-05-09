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
    $id_produto = $_POST['id_produto'];

    $refCor = $conn->query("SELECT * FROM `produtos` WHERE `id` = '$id_produto' ORDER BY id DESC LIMIT 1");     //  busca o produto referente ao id
    $refCor = $refCor->fetch_array(MYSQLI_ASSOC);       //cria uma array associativo
    $pasta = $refCor['pasta'];     // Pasta onde a nova cor será criada

    echo $pasta;

        
        $diretorio = $pasta . '/' . time();  // Irá criar o diretório da cor a ser salva, nomeada pelo timestamp

        $conn->query("INSERT INTO `cores`( `cor`, `referencia`, `fotos`) VALUES ( '$nova_cor', '$id_produto', '$diretorio')");     //query para cadastrar a cor no banco de dados
        

        mkdir($diretorio, 0700);         //cria uma pasta para as fotos da cor


        $diretorio_fotos = $diretorio . '/';

        $controle_upload = 0;

        foreach( $_FILES['arquivos']['name'] as $key){        
            /*
                Faz o upload das imagens no diretório criado
            */


            print_r($key);

            $uploadfile = $diretorio_fotos . $referencia . '_' . $controle_upload . '__' . basename($key);

            echo $uploadfile;

            move_uploaded_file($_FILES['arquivos']['tmp_name'][$controle_upload], $uploadfile);

            $controle_upload++;

        }

        
    echo '<script> window.location.href="./mod_produto?p=2.2&pd=' . $id_produto . '" </script>';

        
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


if(isset($_POST) && $_POST['funcao'] == 'salvar_info'){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];

    $query = $conn->query("UPDATE `produtos` SET `titulo` = '$nome', `valor` = '$valor' WHERE `id` = '$id'");
}


if(isset($_POST) && $_POST['funcao'] == 'salvar_dimensoes'){
    $id = $_POST['id'];
    $altura = $_POST['altura'];
    $largura = $_POST['largura'];
    $comprimento = $_POST['comprimento'];
    $peso = $_POST['peso'];

    $query = $conn->query("UPDATE `produtos` SET `altura` = '$altura', `largura` = '$largura', `comprimento` = '$comprimento', `peso` = '$peso' WHERE `id` = '$id'");
}


if(isset($_POST) && $_POST['funcao'] == 'salvar_descricao'){
    $id = $_POST['id'];
    $descricao = $_POST['descricao'];

    $query = $conn->query("UPDATE `produtos` SET `descricao` = '$descricao' WHERE `id` = '$id' ");
}

if(isset($_POST) && $_POST['funcao'] == 'salvar_capa'){
    $id = $_POST['id'];
    $apagar = $_POST['capa_apagar'];


    unlink($apagar);

    $referencia = rand(0, 99999);
    $dirCapa = "../www/capas/";     // diretorio onde sera salva a foto de capa
    $uploadfile = $dirCapa . basename($referencia . str_replace(' ', '_', $_FILES['capa']['name'])); // faz o upload do arquivo

    // extrai o aquivo da supervariavel FILES do formulario
    move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile);

    $capa = str_replace('../', '',$uploadfile);

    $query = $conn->query("UPDATE `produtos` SET `capa` = '$capa'");
    echo "capa salva";
}

if(isset($_POST) && $_POST['funcao'] == 'editar_cor'){
    $id = $_POST['id'];
    $arquivos = $_POST['arquivos'];
    $cor = $_POST['nome_cor'];

    $consult = [];
    $query = $conn->query("SELECT * FROM `cores` WHERE `id` = '$id'");
    while($consult[] = $query->fetch_assoc());

    $dir = '';
}

if(isset($_POST) && $_POST['funcao'] == 'editar_categoria'){
    $id_produto = $_POST['id'];
    $categoria = $_POST['categoriaNova'];
    $subcategoria = $_POST['subCategoriaNova'];

    $query = $conn->query("UPDATE `produtos` SET `categoria`='$categoria', `subcategoria`='$subcategoria' WHERE `id`='$id_produto'");
}


if(isset($_POST) && $_POST['funcao'] == 'excluir_produto'){
    $id_produto = $_POST['id'];

    $query = $conn->query("UPDATE `produtos` SET `situacao`= 1 WHERE `id`='$id_produto'");

}














?>