<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $passwd = '';
    if(isset($_POST["password"]))
      $passwd = $_POST["password"];
      
    $config = array(
        "host" => $_POST["host"],
        "username" => $_POST["username"],
        "password" => $passwd,
        "database" => $_POST["database"]
    );

    // Caminho para o arquivo JSON de configuração
    $file_path = 'db_config.json';

    // Converte o array em formato JSON e o escreve no arquivo
    if (file_put_contents($file_path, json_encode($config))) {
        echo "As credenciais foram salvas com sucesso!";
        echo '<script> window.location.href="set_db.php" </script>';
    } else {
        echo "Erro ao salvar as credenciais.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Configuração do Banco de Dados</title>
</head>
<body>
    <h1>Configuração do Banco de Dados</h1>
    <form method="post" action="">
        <label for="host">Host:</label>
        <input type="text" name="host" required><br><br>

        <label for="username">Usuário:</label>
        <input type="text" name="username" required><br><br>

        <label for="password">Senha:</label>
        <input type="password" name="password" ><br><br>

        <label for="database">Banco de Dados:</label>
        <input type="text" name="database" required><br><br>

        <input type="submit" value="Salvar Configuração">
    </form>
</body>
</html>
