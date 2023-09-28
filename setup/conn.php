<?php

include_once "db_config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
  echo "Erro na conexão: " . $conn->connect_error;
  echo "<script> window.location.href="
}

mysqli_set_charset($conn, DB_CHARSET);

?>