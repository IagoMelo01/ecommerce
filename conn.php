<?php

include_once "setup/db_config_example.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

mysqli_set_charset($conn, DB_CHARSET);

?>