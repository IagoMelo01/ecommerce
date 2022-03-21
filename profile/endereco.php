<?php include 'header.php'; ?>

<?php 
    $id = $_SESSION['dados']['id'];
    $end = $conn->query("SELECT * FROM enderecos WHERE usuario = '$id' LIMIT 1");
    $end = $end->fetch_array(MYSQLI_ASSOC);

    if(isset($_POST['controle'])){
        $rua = $_POST['rua'];
        $cep = $_POST['cep'];
        $numero = $_POST['numero'];
        $bairro = $_POST['bairro'];
        $complemento = $_POST['complemento'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $usuario = $id;
        $destinatario = $_POST['destinatario'];
        $ponto_referencia = $_POST['ponto_referencia'];

        if(empty($end)){
            $conn->query("INSERT INTO `enderecos`( `rua`, `cep`, `numero`, `bairro`, `complemento`, `estado`, `cidade`, `usuario`, `destinatario`, `ponto_referencia`) VALUES ( '$rua', '$cep', '$numero', '$bairro', '$complemento', '$estado', '$cidade', '$usuario', '$destinatario', '$ponto_referencia' )");
        } else {
            $conn->query("UPDATE `enderecos` SET `rua`='$rua',`cep`='$cep',`numero`='$numero',`bairro`='$bairro',`complemento`='$complemento',`estado`='$estado',`cidade`='$cidade',`usuario`='$usuario',`destinatario`='$destinatario',`ponto_referencia`='$ponto_referencia' WHERE id = '$usuario'");
        }
    }

    $endereco = [];
    $end = $conn->query("SELECT * FROM enderecos WHERE usuario = '$id' LIMIT 1");
    $end = $end->fetch_array(MYSQLI_ASSOC);

    if(!empty($end)){
        $endereco = $end;
    } else {
        $endereco['rua'] = '';
        $endereco['cep'] = '';
        $endereco['numero'] = '';
        $endereco['bairro'] = '';
        $endereco['complemento'] = '';
        $endereco['estado'] = '';
        $endereco['cidade'] = '';
        $endereco['destinatario'] = '';
        $endereco['ponto_referencia'] = '';
    }

?>
    

        <Form class="myorders" method="POST">

            <div class="container-endereco">
                <h1 class="title">Endereço</h1>
                <div class="field">
                    <span>Rua:</span>
                    <input required name="rua" value="<?php echo $endereco['rua'] ; ?>" type="">
                </div>
                <div class="field">
                    <span>CEP</span><br>
                    <input required name="cep" value="<?php echo $endereco['cep'] ; ?>" type="text">
                </div>
                <div class="field">
                    <span>Nome destinatário</span>
                    <input required name="destinatario" value="<?php echo $endereco['destinatario'] ; ?>" type="text">
                </div>
                <div class="field">
                    <span>Número</span>
                    <input required name="numero" value="<?php echo $endereco['numero'] ; ?>" type="">
                </div>
                <div class="field">
                    <span>Complemento</span>
                    <input name="complemento" value="<?php echo $endereco['complemento'] ; ?>" type="text" placeholder="Complemento (opcional)">
                </div>
                <div class="field">
                    <span>Bairro</span>
                    <input required name="bairro" value="<?php echo $endereco['bairro'] ; ?>" type="text">
                </div>
                <div class="field">
                    <span>Estado</span>
                    <input required name="estado" value="<?php echo $endereco['estado'] ; ?>" type="text" placeholder="Minas Gerais">
                </div>
                <div class="field">
                    <span>Cidade</span>
                    <input required name="cidade" value="<?php echo $endereco['cidade'] ; ?>" type="text">
                </div>
                <div class="field">
                    <span>Ponto de referência</span>
                    <input name="ponto_referencia" value="<?php echo $endereco['ponto_referencia'] ; ?>" type="text" placeholder="Ponto de referência (opcional)">
                </div>
                <input type="hidden" name="controle">
                <div class="botao">
                    <input type="submit" value="SALVAR">
                </div>
            </div>
        </Form>
    </div>
</body>

</html>