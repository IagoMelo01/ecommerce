<?php

include_once "db_config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

?>