<?php include 'header.php'; ?>


<?php


if (empty($_SESSION['carrinho']) && empty($_POST)) {
    echo "<br><div><b>Seu carrinho está vazio!</b></div><br>";
    exit;
}


if (isset($_GET['continuar']) && $_GET['continuar'] == 'ok') {
    $continuar = $_GET['continuar'];
    echo '<script>window.location.href = "finalizar.php";</script>';
}

$contCCC = 0;
while (isset($_POST['qtd' . $contCCC])) {
    $idtam =  $_SESSION['carrinho'][$contCCC]['tamanho'];

    $vdtam = $conn->query("SELECT * FROM tamanhos WHERE id = '$idtam' LIMIT 1");
    $vdtam = $vdtam->fetch_array(MYSQLI_ASSOC);

    if ($_POST['qtd' . $contCCC] > $vdtam['quantidade']) {
        echo '<script>alert("Quantidade inválida!")</script>';
    } else {
        $_SESSION['carrinho'][$contCCC]['qtd'] = $_POST['qtd' . $contCCC];
    }
    $contCCC++;
}



sort($_SESSION['carrinho'], SORT_NUMERIC);


/* Exclui um produto  */
if (isset($_GET['ex'])) {
    $it = $_GET['ex'];
    array_splice($_SESSION['carrinho'], $it, 1);
    $_GET = [];
}

/* Adicionar um produto  */
if (isset($_POST['produto'])) {

    $prod = $_POST['produto'];
    $cor = $_POST['cor'];
    $tampd = $_POST['tamanho'];
    $verif = false;
    $contAdc = 0;

    foreach ($_SESSION['carrinho'] as $key) {

        /*
            // Verifica se já está no carrinho
            // Se já está no carrinho adiciona uma unidade a mais
        */
        if ($key['produto'] == $prod && $key['cor'] == $cor && $key['tamanho'] == $tampd) {
            $_SESSION['carrinho'][$contAdc]['qtd'] = $key['qtd'] + 1;
            $verif = true;
        }
        $contAdc++;
    }

    // Se não está no carrinho adiciona o produto
    if (!$verif) {
        $cart = $conn->query("SELECT * FROM produtos WHERE id = '$prod' LIMIT 1");

        $cart = $cart->fetch_array(MYSQLI_ASSOC);

        $_SESSION['carrinho'][] = $_POST;
    }
}





?>

<div id="DivIt" style="display: none;">

</div>


<div class="cartInfo">
    <h4>QUANTIDADE</h4>
    <h4>V. UNITÁRIO</h4>
    <h4>TOTAL&nbsp;&nbsp;</h4>
</div>

<div class="cartContainer">
    <div class="cartListItem">
        <form action="cart" method="post">
            <?php

            /*      CRIA A LISTA NO CARRINHO    */

            $controle = 0;
            $val = [];
            foreach ($_SESSION['carrinho'] as $key) {

                $prod = $key['produto'];
                $corr = $key['cor'];
                $tamm = $key['tamanho'];

                $cart = $conn->query("SELECT * FROM produtos WHERE id = '$prod' LIMIT 1");
                $cart = $cart->fetch_array(MYSQLI_ASSOC);
                $preco = number_format($key['qtd'] * str_replace(',', '.', $cart['valor']), 2, ',', ' ');
                array_push($val, $preco);

                $adcor = $conn->query("SELECT * FROM cores WHERE id = '$corr' LIMIT 1");
                $adcor = $adcor->fetch_array(MYSQLI_ASSOC);

                $adtam = $conn->query("SELECT * FROM tamanhos WHERE id = '$tamm' LIMIT 1");
                $adtam = $adtam->fetch_array(MYSQLI_ASSOC);
            ?>

                <div class="Item">

                    <div>
                        <span onclick="del(<?php echo $controle; ?>)" class="bi-trash"></span>
                    </div>
                    <div>
                        <img style="height: 10vw;" src="<?php echo $cart['capa']; ?>" alt="">
                    </div>
                    <div>
                        <h4><?php echo $cart['titulo'] . ' - ' . $adcor['cor'] . ' - ' . strtoupper($adtam['tamanho']); ?></h4>
                    </div>
                    <div>
                        <input class="qty" type="number" value="<?php echo $_SESSION['carrinho'][$controle]['qtd']; ?>" name="qtd<?php echo $controle; ?>" id="qtd<?php echo $controle; ?>" onchange="quantidade('qtd<?php echo $controle; ?>')">
                    </div>
                    <div>
                        <h3>$ <?php echo $cart['valor']; ?></h3>
                    </div>
                    <div>
                        <h3>$ <?php echo  $preco; ?></h3>
                    </div>

                </div>

            <?php $controle++;
            } ?>
            <br><br>
            <!-- Botão de atualizar a lista de produtos -->
            <div style="width:20%;">
                <input class="continuar" type="submit" value="ATUALIZAR">
            </div>

        </form>
        <?php
            /*  Calcula o preço total dos produtos  */
            $total = 0;
            foreach ($val as $key) {
                $total = $total + str_replace(' ', '', str_replace(',', '.', $key));
            } 
        ?>
        <br><br><br>

        <!-- Calculo de frete -->

        <div class="cartPrice">
            <div class="cartDiv">
                <div style="margin-top: 5%; font-weight: bold;">
                    Subtotal: &nbsp;<p>R$ <?php echo number_format($total, '2', ',', ' '); ?></p>
                </div>

                <div style="margin-top: 5%; font-weight: bold;">
                    Frete:
                    <?php if (!isset($_GET['cep']) && !isset($_POST['frete'])) {; ?>
                        <form action="cart.php" method="get">
                            <input required placeholder="Cep..." class="cep" minlength="9" type="text" name="cep" id="cep">
                            <input class="continuar" style="padding: 2%;" type="submit" value="CALCULAR">
                        </form>
                    <?php } ?>
                </div>

                <div>
                    <?php
                    if (isset($_GET['cep']) && !isset($_POST['frete'])) {
                        $parametros = array();
                        $parametros['nCdEmpresa'] = '';
                        $parametros['sDsSenha'] = '';
                        $parametros['sCepOrigem'] = '01128030';
                        $parametros['sCepDestino'] = $_GET['cep'];
                        $parametros['nVlPeso'] = '1';
                        $parametros['nCdFormato'] = '1';
                        $parametros['nVlComprimento'] = '16';
                        $parametros['nVlAltura'] = '5';
                        $parametros['nVlLargura'] = '10';
                        $parametros['nVlDiametro'] = '0';
                        $parametros['sCdMaoPropria'] = 's';
                        $parametros['nVlValorDeclarado'] = $total;
                        $parametros['sCdAvisoRecebimento'] = 'n';
                        $parametros['StrRetorno'] = 'xml';
                        $parametros['nCdServico'] = '41106';


                        $parametros = http_build_query($parametros);
                        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
                        $curl = curl_init($url . '?' . $parametros);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $dados = curl_exec($curl);
                        $dados = simplexml_load_string($dados);

                        foreach ($dados->cServico as $linhas) {
                            if ($linhas->Erro == 0) {
                                echo '<button style="font-weight:bold;" onclick="frete(1 , ' . str_replace(',', '.', $linhas->Valor) . ', ' . str_replace('-', '', $_GET['cep']) . ')"> PAC - R$ ' . $linhas->Valor . ' - ' . $linhas->PrazoEntrega . ' Dias </button>';
                            } else {
                                echo '<b>PAC</b> - ' . $linhas->MsgErro;
                            }
                            echo '<hr>';
                        }

                        $parametros = array();
                        $parametros['nCdEmpresa'] = '';
                        $parametros['sDsSenha'] = '';
                        $parametros['sCepOrigem'] = '01128030';
                        $parametros['sCepDestino'] = $_GET['cep'];
                        $parametros['nVlPeso'] = '1';
                        $parametros['nCdFormato'] = '1';
                        $parametros['nVlComprimento'] = '16';
                        $parametros['nVlAltura'] = '5';
                        $parametros['nVlLargura'] = '10';
                        $parametros['nVlDiametro'] = '0';
                        $parametros['sCdMaoPropria'] = 's';
                        $parametros['nVlValorDeclarado'] = $total;
                        $parametros['sCdAvisoRecebimento'] = 'n';
                        $parametros['StrRetorno'] = 'xml';
                        $parametros['nCdServico'] = '40010';

                        $parametros = http_build_query($parametros);
                        $url = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx';
                        $curl = curl_init($url . '?' . $parametros);
                        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                        $dados = curl_exec($curl);
                        $dados = simplexml_load_string($dados);

                        foreach ($dados->cServico as $linhas) {
                            if ($linhas->Erro == 0) {
                                echo '<button style="font-weight:bold;" onclick="frete(2 , ' . str_replace(',', '.', $linhas->Valor) . ', ' . str_replace('-', '', $_GET['cep']) . ')"> SEDEX - R$ ' . $linhas->Valor . ' - ' . $linhas->PrazoEntrega . ' Dias </button>';
                            } else {
                                echo '<b>SEDEX</b> - ' . $linhas->MsgErro;
                            }
                            echo '<hr>';
                        }
                    }

                    if (isset($_POST['frete'])) {
                        if ($_POST['frete'] == 1) {
                            $txt = 'PAC';
                        } else {
                            $txt = 'SEDEX';
                        }
                        $_SESSION['frete'] = $_POST;
                        echo '<strong>' . $_POST['cepc'] . ' - ' . $txt . ' - R$ ' . $_POST['vfrete'] . '  </strong></button><a href="cart.php"><span class="bi-x-square"></span><a>';
                    ?>
                        <br><br><br>
                        <a style="text-decoration:none;" href="cart.php?continuar=ok" class="continuar">
                            <div class="continuar">
                                CONTINUAR
                            </div>
                        </a>
                    <?php } ?>



                    <form id="fmfrete" action="cart" method="post">
                        <input id="frete" type="hidden" value="0" name="frete">
                        <input id="vfrete" type="hidden" value="0" name="vfrete">
                        <input id="cepc" type="hidden" name="cepc">
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>