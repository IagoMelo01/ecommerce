<?php

include './head.php';

echo "<title>Carrinho - Divas Pink</title>";

include 'header.php'; 
 
?>




<style type="text/css">
    .searchFormMobile {
        display: none;
        z-index: 1000;
    }
</style>

<?php


if (empty($_SESSION['carrinho']) && empty($_POST)) {
    echo "<br><div><b>Seu carrinho está vazio! <a href='./'>Voltar para o site</a></b></div><br>";
    die;
}


if (isset($_GET['continuar']) && $_GET['continuar'] == 'ok') {
    $continuar = $_GET['continuar'];
    echo '<script>window.location.href = "finalizar.php?token=' . $_SESSION['token'] . '";</script>';
}

/* Atualiza a quantidade no carrinho */

$cont_qtd = 0;
while (isset($_POST['qt' . $cont_qtd])) {
    $idtam =  $_SESSION['carrinho'][$cont_qtd]['tamanho'];

    $vdtam = $conn->query("SELECT * FROM tamanhos WHERE id = '$idtam' LIMIT 1");
    $vdtam = $vdtam->fetch_array(MYSQLI_ASSOC);

    $id_produto_invalido = $_SESSION['carrinho'][$cont_qtd]['produto'];

    $produto_invalido = $conn->query("SELECT * FROM produtos WHERE id = '$id_produto_invalido' LIMIT 1");
    $produto_invalido = $produto_invalido->fetch_array(MYSQLI_ASSOC);

    if ($_POST['qt' . $cont_qtd] > $vdtam['quantidade']) {
        echo '<script>alert("Quantidade inválida: '. $produto_invalido['titulo'] .'. Quantidade superior a disponível no estoque!")</script>';
    } else {
        $_SESSION['carrinho'][$cont_qtd]['qtd'] = $_POST['qt' . $cont_qtd];
    }
    $cont_qtd++;
}




//sort($_SESSION['carrinho'], SORT_NUMERIC);


/* Exclui um produto  */
if (isset($_GET['ex'])) {
    $produto_excluido = $_GET['ex'];
    $cor_excluida = $_GET['corex'];
    $tamanho_excluido = $_GET['tamex'];

    $controle_excluir = 0;

    foreach($_SESSION['carrinho'] as $ex){
        if($ex['produto'] == $produto_excluido && $ex['cor'] == $cor_excluida && $ex['tamanho'] == $tamanho_excluido){
            array_splice($_SESSION['carrinho'], $controle_excluir, 1);
        }
        $controle_excluir++;
    }
    
    $_GET = [];
}

/* Adicionar um produto  */
if (isset($_POST['produto'])) {

    $produto = $_POST['produto'];
    $cor_produto = $_POST['cor'];
    $tamanho_produto = $_POST['tamanho'];
    $verificador = false;           //Variavel de referencia se o item está no carrinho
    $contAdc = 0;

    foreach ($_SESSION['carrinho'] as $key) {

        /*
            // Verifica se já está no carrinho
            // Se já está no carrinho adiciona uma unidade a mais
        */
        if ($key['produto'] == $produto && $key['cor'] == $cor_produto && $key['tamanho'] == $tamanho_produto) {
            $_SESSION['carrinho'][$contAdc]['qtd'] = $key['qtd'] + 1;
            $verificador = true;
        }
        $contAdc++;
    }

    // Se não está no carrinho adiciona o produto
    if (!$verificador) {
        $carrinho = $conn->query("SELECT * FROM produtos WHERE id = '$produto' LIMIT 1");

        $carrinho = $carrinho->fetch_array(MYSQLI_ASSOC);

        $_SESSION['carrinho'][] = $_POST;
    }
}

$frete = 0;

?>

<div id="DivIt" style="display: none;">

</div>

<div class="cart-container">
    <div class="cart__items">
        <h1 class="cart__title">Meu carrinho</h1>
        <form action="cart" method="post">
            <input type="hidden" name="atualizar" value="ok">
            <?php 

            /*      CRIA A LISTA NO CARRINHO    */

                $controle = 0;
                $val = [];
                foreach($_SESSION['carrinho'] as $key){
                    
                    $produto_carrinho = $key['produto'];
                    $cor_carrinho = $key['cor'];
                    $tamanho_carrinho = $key['tamanho'];

                    $carrinho = $conn->query("SELECT * FROM produtos WHERE id = '$produto_carrinho' LIMIT 1");
                    $carrinho = $carrinho->fetch_array(MYSQLI_ASSOC); 

                    $preco = number_format($key['qtd'] * str_replace(',', '.', $carrinho['valor']), 2, ',', '.');
                    array_push($val, $preco);

                    $adicionar_cor = $conn->query("SELECT * FROM cores WHERE id = '$cor_carrinho' LIMIT 1");
                    $adicionar_cor = $adicionar_cor->fetch_array(MYSQLI_ASSOC); 

                    $adicionar_tamanho = $conn->query("SELECT * FROM tamanhos WHERE id = '$tamanho_carrinho' LIMIT 1");
                    $adicionar_tamanho = $adicionar_tamanho->fetch_array(MYSQLI_ASSOC); ?>

            


                    <div class="product-item">
                        <div class="product-details">
                            <img src="<?php echo $carrinho['capa'] ;?>">
                            <div class="product-details__info">
                                <div class="product-details__info_name_icon">
                                    <div>
                                        <h3 class="name"><?php echo $carrinho['titulo'] ;?></h3>
                                    </div>
                                    <div class="remove-icon">
                                        <span onclick="del('<?php echo $key['produto'] ;?>', '<?php echo $key['cor'] ;?>', '<?php echo $key['tamanho'] ;?>')" class="bi-trash"></span>
                                    </div>
                                </div>
                                <div class="custom">
                                    <p class="custom__text"><strong>Tamanho:</strong>&nbsp;<?php echo $adicionar_tamanho['tamanho'] ;?></p>
                                    <p class="custom__text"><strong>Cor:</strong>&nbsp;<?php echo $adicionar_cor['cor'] ;?></p>
                                </div>
                            </div>
                        </div>
                        <div class="product-item__controller">
                            <div class="product-qtd">
                                <span class="product-qtd__label"><strong>Quantidade:</strong>&nbsp;</span>
                                <button type="button" onclick="sbtqtd('qt<?php echo $controle; ?>')" class="product-qtd__btn decrease">-</button>
                                <input id="qt<?php echo $controle; ?>" name="qt<?php echo $controle; ?>" type="number" value="<?php echo $key['qtd'] ?>" readonly class="product-qtd__input">
                                <button type="button" onclick="adcqtd('qt<?php echo $controle; ?>')" class="product-qtd__btn increase">+</button>
                            </div>
                            <div class="product-prices__content">
                                <p class="price">R$ <?php echo $preco; ?></p>
                            </div>
                        </div>
                    </div>


            <?php 
            
                    $controle++;
                }

            ?>
            <div class="div-button-atualizarcarrinho">
                <input class="btn btn--secondary btn--block btn_cart_atualizar" type="submit" value="ATUALIZAR CARRINHO">
            </div>
        </form>

        <?php
            /*  Calcula o preço total dos produtos  */
            $subtotal = 0;
            foreach ($val as $key) {
                $subtotal = $subtotal + str_replace(',', '.', str_replace('.', '', $key));
            } 
        ?>



        <div class="frete_container">
            <?php
            if (isset($_GET['cep']) && !isset($_POST['frete']) && !empty($_GET['cep'])) {
                $cep = str_replace('-', '', $_GET['cep']);
                if($cep > 39400000 && $cep < 39430000 ){
                    echo '<button class="btn frete_btn btn--tertiary btn--block" style="font-weight:bold;" onclick="frete('. "'Motoboy'" .' , ' . str_replace(',', '.', '7,00') . ', ' . str_replace('-', '', $_GET['cep']) . ')"> Motoboy - R$ 7,00 -  2 Dias </button>';
                } else {
                    $parametros = array();
                    $parametros['nCdEmpresa'] = '';
                    $parametros['sDsSenha'] = '';
                    $parametros['sCepOrigem'] = '39400-059';
                    $parametros['sCepDestino'] = $_GET['cep'];
                    $parametros['nVlPeso'] = '1';
                    $parametros['nCdFormato'] = '1';
                    $parametros['nVlComprimento'] = '16';
                    $parametros['nVlAltura'] = '5';
                    $parametros['nVlLargura'] = '10';
                    $parametros['nVlDiametro'] = '0';
                    $parametros['sCdMaoPropria'] = 's';
                    $parametros['nVlValorDeclarado'] = $subtotal;
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
                            echo '<button class="btn frete_btn btn--tertiary btn--block" style="font-weight:bold;" onclick="frete(' . "'PAC'" . ', ' . str_replace(',', '.', $linhas->Valor) . ', ' . str_replace('-', '', $_GET['cep']) . ')"> PAC - R$ ' . $linhas->Valor . ' - ' . $linhas->PrazoEntrega . ' Dias </button>';
                        } else {
                            echo '<button class="btn frete_btn btn--tertiary btn--block"><b>PAC</b> - Indisponível</button>';
                        }
                        echo '<div style="width: 10%;"></div>';
                    }

                    $parametros = array();
                    $parametros['nCdEmpresa'] = '';
                    $parametros['sDsSenha'] = '';
                    $parametros['sCepOrigem'] = '39400-059';
                    $parametros['sCepDestino'] = $_GET['cep'];
                    $parametros['nVlPeso'] = '1';
                    $parametros['nCdFormato'] = '1';
                    $parametros['nVlComprimento'] = '16';
                    $parametros['nVlAltura'] = '5';
                    $parametros['nVlLargura'] = '10';
                    $parametros['nVlDiametro'] = '0';
                    $parametros['sCdMaoPropria'] = 's';
                    $parametros['nVlValorDeclarado'] = $subtotal;
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
                            echo '<button class="btn frete_btn btn--tertiary btn--block" style="font-weight:bold;" onclick="frete( '. "'SEDEX'" .' , ' . str_replace(',', '.', $linhas->Valor) . ', ' . str_replace('-', '', $_GET['cep']) . ')"> SEDEX - R$ ' . $linhas->Valor . ' - ' . $linhas->PrazoEntrega . ' Dias </button>';
                        } else {
                            echo '<button class="btn frete_btn btn--tertiary btn--block"><b>SEDEX</b> - Indisponível</button>';
                        }
                    }
                }
                
            }

            if (isset($_POST['frete'])) {
                if ($_POST['frete'] == 1) {
                    $txt = 'PAC';
                } else {
                    $txt = 'SEDEX';
                }
                $_SESSION['frete'] = $_POST;
                $frete = $_POST['vfrete'];
                echo '<div><strong style="font-size: 0.8rem;">' . $_POST['cepc'] . ' - ' . $txt . ' - R$ ' . $_POST['vfrete'] . '  </strong></button><a class="summary__actions_continuar" style="background-color: rgb(194, 5, 43);" href="cart.php">ALTERAR CEP<a></div>';
            ?>

                <br><br><br>
                <script>
                    $(".btn_cart_continuar").css({display: block});
                </script>
            <?php } ?>
        </div>



        <?php
            if((empty($_GET['cep']) && isset($_GET['cep'])) || (!isset($_GET['cep']) && !isset($_POST['frete']))){
        ?>

            <form class="freight-form" action="" method="get">
                <h3 class="freight-form__title"> Simule frete e prazo de entrega</h3>
                <div class="freight-form__content">
                    <div class="freight-form__content_div">
                        <span>Digite aqui seu CEP</span>
                        <input type="text" name="cep" class="float-input__input cep" placeholder="...">
                    </div>
                    <button class="btn btn--tertiary btn--block">Calcular</button>
                </div>
            </form>
        <?php } ?>
    </div>

    <form id="fmfrete" action="cart" method="post">
        <input id="frete" type="hidden" value="0" name="frete">
        <input id="vfrete" type="hidden" value="0" name="vfrete">
        <input id="cepc" type="hidden" name="cepc">
    </form>

    <?php 
        $total = $subtotal + $frete;
        $_SESSION['total'] = $total;
    
    ?>

    <div class="cart__summary">
        <h1 class="cart__title">Resumo da compra</h1>
        <div class="summary">
            <ul class="summary__items">
                <li class="summary__item">
                    <div class="summary__item_title">Subtotal</div>&nbsp;
                    <div class="summary__item_price">R$ <?php echo number_format($subtotal, '2', ',', '.'); ?></div>
                </li>
                <li class="summary__item">
                    <div class="summary__item_title">Frete</div>&nbsp;
                    <div class="summary__item_price">R$ <?php echo number_format($frete, '2', ',', '.'); ?></div>
                </li>

                <li class="summary__item">
                    <div class="summary__item_title">Desconto</div>&nbsp;
                    <div class="summary__item_price">R$ 0,00</div>
                </li>
                <li class="summary__item">
                    <div class="summary__item_title">Valor total</div>&nbsp;
                    <div class="summary__item_price">R$ <?php echo number_format($total, '2', ',', '.'); ?></div>
                </li>
            </ul>
            <div class="summary__actions">
                <?php if (isset($_POST['frete'])) { ?>
                    <a href="cart.php?continuar=ok" class="summary__actions_continuar">CONTINUAR</a>
                <?php } ?>
                <a href="https://divaspink.com.br" class="btn btn--secondary btn--block">ESCOLHER MAIS PRODUTOS</a>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>