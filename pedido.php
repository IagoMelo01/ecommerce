<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/pedido.css">
    <title>Document</title>
</head>

<body>
    <?php include "header.php";?>
    
    <style type="text/css">
        @media (max-width: 768px) {
            .searchFormMobile {
                display: none;
                z-index: 1000;
            }
        }
    </style>
    
    <div class="container">
            <div class="side-menu pc">
                <a href="pedido.php">
                    <div class="item">
                        <div>
                            <span2>Pedidos</span2>
                        </div>
                        <div class="barra-horizontal"></div>
                    </div>
                </a>

                <a href="dados.php">
                    <div class="item">
                        <div>
                            <span2>Seus dados</span2>
                        </div>
                        <div class="barra-horizontal"></div>
                    </div>
                </a>

                <a href="endereco.php">
                    <div class="item">
                        <div>
                            <span2>Endereço</span2>
                        </div>
                        <div class="barra-horizontal"></div>
                    </div>
                </a>

                <a href="">
                    <div class="item">
                        <div>
                            <span2>Sair</span2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="myorders">
                <h1 class="title pc">Pedidos</h1>
                <div class="card">
                    <h1 class="title mobile">Pedidos</h1>
                    <div class="container-product">
                        <img class="img-product" src="./profile/tenis.jpg" alt="">
                        <div class="content-product">
                            <b>Tênis Nike Revolution 5 Masculino</b>
                            <span3>Cor: <strong>Preto+verde</strong></span3><br>
                            <span3>Tamanho: <strong>42</strong></span3><br>
                            <span3>Quantidade: <strong>1</strong></span3><br>
                            <span3>Valor unitário: <strong>R$ 189,99</strong></span3>
                        </div>
                    </div>

                    <div class="container-tracking">
                        <div class="tracking">
                            <span3>Status do pedido: <br> <strong>Pedido entregue - 07/05/2021 09:07</strong></span3>
                        </div>
                        <div class="actions">
                            <button class="action-button">TROCAR PRODUTO</button>
                        </div>
                    </div>

                    <div class="container-summary pc">
                        <b>Resumo da compra</b>
                        <span3>Pedido: <strong>65168795</strong></span3><br><br>
                        <span3>Data do pedido: <strong>28/04/2021</strong></span3><br><br>
                        <span3>Valor total: <strong>R$ 189,99</strong></span3><br><br>
                        <span3>Entrega realizada em: <strong>07/05/2021</strong></span3>
                        <div class="actions">
                            <button class="action-button">DETALHES</button>
                        </div>
                    </div>

                    <div class="container-summary mobile">
                        <span3>Pedido: <strong>65168795</strong></span3><br>
                        <span3>Data do pedido: <strong>28/04/2021</strong></span3><br>
                        <span3>Valor total: <strong>R$ 189,99</strong></span3><br>
                        <span3>Entrega realizada em: <strong>07/05/2021</strong></span3>
                        <div class="actions">
                            <button class="action-button">DETALHES</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</body>

</html>