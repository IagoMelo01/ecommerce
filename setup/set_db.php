<?php

  include_once "db_config.php";

  $servername = DB_HOST; // Substitua pelo nome do seu servidor MySQL
  $username = DB_USER; // Substitua pelo seu nome de usuário
  $password = DB_PASS; // Substitua pela sua senha
  $database_name = DB_NAME; // Nome do banco de dados desejado

  // Cria uma conexão com o servidor MySQL
  $conn = new mysqli($servername, $username, $password);

  // Verifica a conexão
  if ($conn->connect_error) {
      die("Erro na conexão: " . $conn->connect_error);
  }

  // Consulta SQL para verificar a existência do banco de dados
  $check_database_sql = "SELECT SCHEMA_NAME
                        FROM INFORMATION_SCHEMA.SCHEMATA
                        WHERE SCHEMA_NAME = '$database_name'";

  $result = $conn->query($check_database_sql);

  if ($result->num_rows == 0) {
      // O banco de dados não existe, portanto, cria o novo banco de dados
      $create_database_sql = "CREATE DATABASE $database_name";

      if ($conn->query($create_database_sql) === TRUE) {
          echo "Banco de dados criado com sucesso!";
      } else {
          echo "Erro ao criar o banco de dados: " . $conn->error;
      }
  } else {
      echo "O banco de dados já existe.";
  }

  // Fecha a conexão com o servidor MySQL
  $conn->close();




  $arquivo_sql = 'database_model.sql';

  // Lê o conteúdo do arquivo e armazena em uma variável
  $query = file_get_contents($arquivo_sql);

  // Verifica se a leitura foi bem-sucedida
  if ($query === false) {
      echo "Não foi possível ler o arquivo SQL.";
  } else {
      // Agora, $query contém o conteúdo do arquivo .sql
      $dsn = 'mysql:host='. DB_HOST .';dbname='. DB_NAME;
      $usuario = DB_USER;
      $senha = DB_PASS;

      try{
        $conexao = new PDO($dsn, $usuario, $senha);
    
        $stmt = $conexao->exec($query);
        
      } catch(PDOException $e){
        echo 'Erro: ' . $e->getCode() . "<br>" . "Mensagem: " . $e->getMessage();
      }
  }

  echo '<script> window.location.href="../" </script>';