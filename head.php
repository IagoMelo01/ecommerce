<?php if(!isset($_SESSION['started'])){ 
    session_start();
    $_SESSION['started'] = 'true';
    $a = 0;
    $b = 20;
    $Strings='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $_SESSION['token'] = substr(str_shuffle($Strings), $a, $b);
}

include 'conn.php';



if (isset($_POST['login'])) {
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $senha = mysqli_real_escape_string($conn, $senha);
    $email = mysqli_real_escape_string($conn, $email);

    if (strlen($senha) > 7) {
        $sql = "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'";
        $result = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if (count($result) != 0) {
            $_SESSION['logged'] = 'ok';
            $_SESSION['dados'] = $result;
        }
    } else {
        $controle = 1;
        echo "<script> alert('Dados Inválidos! Tente novamente.')</script>";
    }
} elseif (isset($_POST['cadastro'])) {
    $cel = str_replace(array('(', ') ', '-'), '', $_POST['cel']);
    $cpf = str_replace(array('.', '-'), '', $_POST['cpf']);
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $data_nasc = $_POST['nascimento'];
    $estado_cad = $_POST['estado'];
    $cidade_cad = $_POST['cidade'];
    $bairro_cad = $_POST['bairro'];
    $rua_cad = $_POST['rua'];
    $numero_cad = $_POST['numero'];
    if ($_POST['senha'] == $_POST['c_senha']) {
        $conn->query("INSERT INTO `usuarios`( `nome`, `email`, `senha`, `telefone`, `cpf`, `nascimento`, `estado`, `cidade`, `bairro`, `rua`, `numero`) VALUES ( '$nome', '$email', '$senha', '$cel', '$cpf', '$data_nasc', '$estado_cad', '$cidade_cad', '$bairro_cad', '$rua_cad', '$numero_cad')");
        $_SESSION['logged'] = 'ok';
        $consult = $conn->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha' ");
        $result = $consult->fetch_array(MYSQL_ASSOC);
        $_SESSION['dados'] = $result;
    } else {
        $controle = 1;
        echo "<script> alert('Senhas diferentes, tente novamente!')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style1.css" media="screen and (min-width: 480px) and (max-width: 768px)">
    <link rel="stylesheet" type="text/css" href="css/style1.css" media="screen and (max-width: 480px)">
    <link rel="stylesheet" href="css/style.css" media="screen and (min-width: 769px)">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Imbue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="./js/script.js"></script>
    <script src="./js/jquery.mask.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
