<?php

$id = $_GET['id'];

include "../conn.php";

$conn->query("UPDATE `cupons` SET validade = '1969-1-1' WHERE id ='$id'");



?>

<script>
   window.location="./promo?p=3.1"
</script>