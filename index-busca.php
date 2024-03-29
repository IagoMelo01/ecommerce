<?php
include_once './setup/conn.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Celke</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    </head>
    <body>
        <h1>Pesquisar</h1>
        <form method="POST" action="">
            <label>Assunto: </label>
            <input type="text" name="assunto" id="assunto" placeholder="Pesquisar pelo assunto">

            <input type="submit" name="SendPesqMsg" value="Pesquisar">
        </form><br><br>
        <?php
        $SendPesqMsg = filter_input(INPUT_POST, 'SendPesqMsg', FILTER_SANITIZE_STRING);
        if ($SendPesqMsg) {
            $assunto = filter_input(INPUT_POST, 'assunto', FILTER_SANITIZE_STRING);

            //SQL para selecionar os registros
            $result_msg_cont = "SELECT * FROM produtos WHERE titulo LIKE '%$assunto%' ORDER BY id ASC LIMIT 7";
            $resultado_msg_cont = $conn->query($result_msg_cont);
            // $resultado_msg_cont->execute();

            while ($row_msg_cont = $resultado_msg_cont->fetch_assoc()) {
                echo "ID: " . $row_msg_cont['id'] . "<br>";
                echo "Nome: " . $row_msg_cont['titulo'] . "<br>";
            }
        }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
            $(function () {
                $("#assunto").autocomplete({
                    source: 'proc_pesq_msg.php'
                });
            });
        </script>
    </body>
</html>
