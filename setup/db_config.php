<?php

// Caminho para o arquivo JSON de configuração
$file_path = 'db_config.json';

// Verifica se o arquivo existe
if (file_exists($file_path)) {
    // Lê o conteúdo do arquivo JSON e decodifica em um array associativo
    $config_data = json_decode(file_get_contents($file_path), true);

    // Verifica se a decodificação foi bem-sucedida
    if ($config_data) {
        // As credenciais estão agora em $config_data
        $host = $config_data['host'];
        $username = $config_data['username'];
        $password = $config_data['password'];
        $database = $config_data['database'];

        
        // Defina as constantes de credenciais do banco de dados
        define('DB_HOST', $host); // Endereço do servidor do banco de dados
        define('DB_USER', $username); // Nome de usuário do banco de dados
        define('DB_PASS', $password); // Senha do banco de dados
        define('DB_NAME', $database); // Nome do banco de dados nome recomendado = 'store'
    } else {
        echo "Falha ao decodificar o arquivo JSON.";
    }
} else {
    echo "O arquivo JSON de configuração não existe.";
    echo '<script> window.location.href="setup/setup.php" </script>';

}

// Outras configurações
define('DB_CHARSET', 'utf8'); // Conjunto de caracteres (RECOMENDADO utf8)


?>