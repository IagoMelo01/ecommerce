<?php include 'header.php'; 
    include '../conn.php';

    $id_pedido = $_GET['pedido'];

    if(isset($_POST['situacao'])){
        $situacao = $_POST['situacao'];
        $conn->query("UPDATE vendas SET situacao='$situacao' WHERE id = '$id_pedido'");
    }

    $consulta_pedido = $conn->query("SELECT * FROM vendas WHERE id = '$id_pedido'");
    $consulta_pedido = $consulta_pedido->fetch_assoc();

    $id_usuario = $consulta_pedido['usuario'];

    $consulta_usuario = $conn->query("SELECT * FROM usuarios WHERE id = '$id_usuario'");
    $consulta_usuario = $consulta_usuario->fetch_assoc();

    $referencia_pedido = $consulta_pedido['id'];

    $consulta_itens = $conn->query("SELECT * FROM pedidos WHERE referencia = '$referencia_pedido'");
    $lista_itens = [];
    while($lista_itens[] = $consulta_itens->fetch_assoc());

?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Detalhes do Pedido</h5>
                        <p class="m-b-0">&nbsp;</p>
                    </div>
                </div>
                <!--<div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="index.html"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Basic Components</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Accordion</a>
                                            </li>
                                        </ul>
                                    </div>-->
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">

                <!-- Page-body start -->
                <div class="page-body">
                    <!-- Row start -->
                    <div class="row">
                        <!-- Multiple Open Accordion start -->
                        <!--<div class="col-lg-6">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5 class="card-header-text">All Close Accordion</h5>
                                                    </div>
                                                    <div class="card-block accordion-block">
                                                        <div id="accordion" role="tablist" aria-multiselectable="true">
                                                            <div class="accordion-panel">
                                                                <div class="accordion-heading" role="tab" id="headingOne">
                                                                    <h3 class="card-title accordion-title">
                                                                        <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                                                        data-parent="#accordion" href="#collapseOne"
                                                                        aria-expanded="true" aria-controls="collapseOne">
                                                                        Lorem Message 1
                                                                    </a>
                                                                </h3>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                                                <div class="accordion-content accordion-desc">
                                                                    <p>
                                                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                                        survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                                                        sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-panel">
                                                            <div class="accordion-heading" role="tab" id="headingTwo">
                                                                <h3 class="card-title accordion-title">
                                                                    <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                                                    data-parent="#accordion" href="#collapseTwo"
                                                                    aria-expanded="false"
                                                                    aria-controls="collapseTwo">
                                                                    Lorem Message 2
                                                                </a>
                                                            </h3>
                                                        </div>
                                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                                            <div class="accordion-content accordion-desc">
                                                                <p>
                                                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                                    survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                                                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="accordion-panel">
                                                        <div class=" accordion-heading" role="tab" id="headingThree">
                                                            <h3 class="card-title accordion-title">
                                                                <a class="accordion-msg waves-effect waves-dark" data-toggle="collapse"
                                                                data-parent="#accordion" href="#collapseThree"
                                                                aria-expanded="false"
                                                                aria-controls="collapseThree">
                                                                Lorem Message 3
                                                            </a>
                                                        </h3>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="accordion-content accordion-desc">
                                                            <p>
                                                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                                                                survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                                                                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>-->
                    </div>
                </div>
            </div>
            <!-- Multiple Open Accordion ends -->
            <!-- Single Open Accordion start -->
            <!-- Single Open Accordion ends -->
        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="row">
            <!-- Color Open Accordion start -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Cliente</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <h5>Dados do cliente:</h5>
                        <div>
                            <div class="line">
                                <h6 style="margin: 0px;">Nome:</h6>
                                <span><?php echo $consulta_usuario['nome']; ?></span>
                            </div>

                            <div class="line">
                                <h6 style="margin: 0px;">Email:</h6>
                                <span><?php echo $consulta_usuario['email']; ?></span>
                            </div>

                            <div class="line">
                                <h6 style="margin: 0px;">Celular:</h6>
                                <span><?php echo $consulta_usuario['telefone']; ?></span>
                            </div>

                            <div class="line">
                                <h6 style="margin: 0px;">CPF:</h6>
                                <span><?php echo $consulta_usuario['cpf']; ?></span>
                            </div>
                        </div>
                        <br><br>
                        <h5>Informações de envio:</h5>
                        <div>
                            <div class="line">
                                <h6 style="margin: 0px;">Destinatário:</h6>
                                <span><?php echo $consulta_pedido['destinatario']; ?></span>
                            </div>

                            <div class="line">
                                <h6 style="margin: 0px;">Endereço:</h6>
                                <span><?php echo $consulta_pedido['endereco']; ?></span>
                            </div>

                            <div class="line">
                                <h6 style="margin: 0px;">CEP:</h6>
                                <span><?php echo $consulta_pedido['cep']; ?></span>
                            </div>
                            <div class="line">
                                <h6 style="margin: 0px;">Ponto de referência:</h6>
                                <span><?php echo $consulta_pedido['ponto_referencia']; ?></span>
                            </div>
                            <div class="line">
                                <h6 style="margin: 0px;">Frete:</h6>
                                <span><?php echo $consulta_pedido['frete']; ?></span>
                            </div>
                        </div>
                        <br><br>
                        <h5>Status:</h5>
                        <div class="line">
                            <h6 style="margin: 0px;">Situação do pagamento:</h6>
                            <span><?php echo $consulta_pedido['situacao_pagamento']; ?></span>
                        </div>
                        <br>
                        <h6 styles="margin: 0px;">Definir status do pedido</h6>
                        <form action="" method="post">
                            <input name="situacao" type="text" value="<?php echo $consulta_pedido['situacao'] ?>" class="formField"><br>
                            <input type="submit" value="Salvar" class="formField" style="background-color: #11c15b; color: #ffff; border: 1px solid #11c15b; margin-top: 10px;"><br>
                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">
                        <h5>Produtos</h5>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Foto</th>
                                        <th>Produto</th>
                                        <th>Cor</th>
                                        <th>Tamanho</th>
                                        <th>Quantidade</th>
                                        <th>Preço</th>
                                        <th>Valor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        foreach($lista_itens as $key){
                                            if($key){
                                                $id_produto = $key['produto'];
                                                $id_cor = $key['cor'];
                                                $id_tamanho = $key['tamanho'];

                                                $produto = $conn->query("SELECT * FROM produtos WHERE id = '$id_produto'");
                                                $produto = $produto->fetch_assoc();
                                                
                                                $cor = $conn->query("SELECT * FROM cores WHERE id = '$id_cor'");
                                                $cor = $cor->fetch_assoc();
                                                
                                                $tamanho = $conn->query("SELECT * FROM tamanhos WHERE id = '$id_tamanho'");
                                                $tamanho = $tamanho->fetch_assoc();
                                    ?>
                                                <tr>
                                                    <th scope="row"><img src="../<?php echo $produto['capa']; ?>" alt="tenis" style="width: 160px;"></th>
                                                    <td><?php echo $produto['titulo']; ?></td>
                                                    <td><?php echo $cor['cor']; ?></td>
                                                    <td><?php echo $tamanho['tamanho']; ?></td>
                                                    <td><?php echo $key['quantidade']; ?></td>
                                                    <td>R$<?php echo $produto['valor']; ?></td>
                                                    <td>R$<?php echo str_replace(',', '.',  $produto['capa']) * $key['quantidade']; ?></td>
                                                </tr>
                                    <?php 
                                            }
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12" style=" display: flex; align-items: center; justify-content: center; background-color: #FFFFFF; padding: 20px; margin-top: -15px; border-radius: 4px;">
                    <input type="submit" value="Excluir Pedido" class="formField" style="background-color: red; color: #ffff; border: 1px solid red;">
                </div>
                <style>
                    .line {
                        display: flex;
                        align-items: center;
                    }

                    .line span {
                        margin-left: 5px;
                    }

                    @media (max-width: 425px) {
                        .formField {
                            height: 35px;
                            width: 75vw;
                        }
                    }

                    @media (min-width: 426px) {
                        .formField {
                            height: 35px;
                            width: 60vw;
                        }
                    }

                    @media (min-width: 768px) {
                        .formField {
                            height: 35px;
                            width: 30vw;
                        }
                    }
                </style>
                <!-- Color Open Accordion ends -->

            </div>
            <!-- Row end -->

        </div>
        <!-- Page-body end -->
    </div>


<div id="styleSelector">

</div>
</div>
</div>
</div>
</div>
</div>
</div>


<!-- Main-body end -->
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 10]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
<!-- waves js -->
<script src="assets/pages/waves/js/waves.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Accordion js -->
<script type="text/javascript" src="assets/pages/accordion/accordion.js"></script>
<!-- Custom js -->
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/vertical/vertical-layout.min.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>