<?php 

include_once '../setup/conn.php'; 

//cadastra o cupom

    if(isset($_POST['codigo'])){
        $cupom_codigo = $_POST['codigo'];
        $cupom_v_minimo = $_POST['v_minimo'];
        $cupom_validade = $_POST['validade'];
        $cupom_porcentagem = $_POST['porcentagem'];
        $cupom_categorias = '';
        if($_POST['todas'] == 'on'){        //Se o botão todas as categorias foi selecionado o valor é menos 1
            $cupom_categorias = '-1';
        } else {                            // Se não, é criada uma string com os id de cada categoria que o cupom se aplica
            $flow_control_promo_checkbox = 0;
            while(isset($_POST['cat' . $flow_control_promo_checkbox ])){
                $local_id_cat = $_POST['id_cat' . $flow_control_promo_checkbox ];
                $cupom_categorias = $cupom_categorias . $local_id_cat . " ; ";
                $flow_control_promo_checkbox++;
            }
        }
        echo $cupom_categorias;
        
        
        //executa a query
        $conn->query("INSERT INTO `cupons`( `codigo`, `valor_minimo`, `desconto`, `categorias`, `validade`) VALUES ( '$cupom_codigo', '$cupom_v_minimo', '$cupom_porcentagem', '$cupom_categorias', '$cupom_validade' )");
    }
    include 'header.php'; 
    
?>



<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Criar Promoções</h5>
                        <p class="m-b-0">&nbsp;</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Page-header end -->
    <div class="pcoded-inner-content">
        <div class="main-body">
        </div>
        <!-- Row end -->
        <!-- Row start -->
        <div class="row">
            <!-- Color Open Accordion start -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                        <div class="container-promo">
                            <div class="container-promo-div">
                                <div>
                                    <h6>Código do cupom:</h6>
                                    <input name="codigo" maxlength="11" type="text" class="formField">
                                </div><br>
                                <div>
                                    <h6>Porcentagem do desconto:</h6>
                                    <input name="porcentagem" type="number" class="formField">
                                </div><br><div>
                                    <h6>Valor mínimo do pedido:</h6>
                                    <input name="v_minimo" type="number" class="formField">
                                </div><br>
                                <div>
                                    <h6>Validade:</h6>
                                    <input name="validade" type="date" class="formField">
                                </div>
                            </div>

                            <br>

                            <span>Categorias que vão receber o desconto:</span><br>
                            <ul>
                                <li>
                                    <div>
                                        <input id="todas_cat" type="checkbox" id="toadas_categotias_promo" name="todas" onclick="mudarCategoriasSelec_promo()" checked>
                                        <label for="cat1">Todas</label>
                                    </div>
                                </li>

                                <?php 

                                    /*
                                    Lista todas as categorias existentes para aplicação do cupom
                                    */
                                
                                    $listar_categorias = $conn->query("SELECT * FROM categorias WHERE 1");
                                    $categorias_lista = [];
                                    if($listar_categorias){
                                        while($categorias_lista[] = $listar_categorias->fetch_assoc());

                                    }
                                    $flow_control_promo1 = 0;
                                    foreach($categorias_lista as $key){
                                        if(!empty($key)){
                                            //cria as checkbox de cada categoria mais um input hidden para o id
                                
                                ?>

                                    <li>
                                        <div>
                                            <input class="check_categorias_js" type="checkbox" name="<?php echo 'cat' . $flow_control_promo1 ?>" onclick="mudarCategoriasSelecTodas()" checked>
                                            <input type="hidden" name="<?php echo 'id_cat' . $flow_control_promo1 ?>" value="<?php echo $key['id']; ?>">
                                            <label for="cat2"><?php echo $key['categoria'] ?></label>
                                        </div>
                                    </li>

                                <?php $flow_control_promo1++; }}; ?>
                                
                            </ul>
                        </div>
                        <input type="submit" value="Salvar">
                        </form>
                    </div>

                    <style>
                        @media (min-width: 610px) {
                            .container-promo-div {
                                display: flex;
                                justify-content: space-between;
                            }
                        }

                        @media(max-width: 609px) {
                            .formField {
                                width: 70vw;
                                height: 35px;
                            }
                        }
                    </style>

                    <!-- Color Open Accordion ends -->
                </div>
                <!-- Row end -->
            </div>
            <!-- Page-body end -->
        </div>




        <div class="row">
            <!-- Color Open Accordion start -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <form action="" method="post">
                        <div class="container-promo">
                            <div class="container-promo-div">
                                <div>
                                    Código do cupom:
                                </div> <br>
                            
                                <div>
                                    Validade:
                                </div> <br>
                                <div><button style="color: transparent; background-color: transparent; border: none">desativar</button></div>
                            </div> <hr style="background-color: darkgrey">

                            <?php 

                            /* 
                                Lista todos os cupons existentes e quando é clicado em desativar
                                a validade do cupom é alterada para 1 de janeiro de 1969

                                a ação é direcionada pra "./desativar_cupom.php" com uma
                                variavel GET com id do cupom desativado
                            
                            */
                            
                                $listar_cupons = $conn->query("SELECT * FROM cupons WHERE 1");
                                $cupons_lista = [];

                                if($listar_cupons){
                                    while($cupons_lista[] = $listar_cupons->fetch_assoc());

                                }

                                $flow_control_promo2 = 0;
                                foreach($cupons_lista as $key){
                                    if(!empty($key)){
                            
                            ?>

                                        <div class="container-promo-div">
                                            <div>
                                                <?php echo $key['codigo']; ?>
                                            </div> <br>
                                        
                                            <div>
                                                <?php echo $key['validade']; ?>
                                            </div> <br>
                                            <div>
                                                <button onclick="desativar_cupom(<?php echo $key['id']; ?>)" class="button_disable">Desativar</button>
                                            </div>
                                        </div> <hr>     

                            <?php } $flow_control_promo2++; } ?>

                            
                        </div>
                        </form>
                    </div>

                    <style>
                        @media (min-width: 610px) {
                            .container-promo-div {
                                display: flex;
                                justify-content: space-between;
                            }
                        }

                        @media(max-width: 609px) {
                            .formField {
                                width: 70vw;
                                height: 35px;
                            }
                        }
                        .button_disable {
                            color: red;
                            border: 1px solid red;
                            background-color: white;
                            border-radius: 5px;
                        }
                    </style>

                    <!-- Color Open Accordion ends -->
                </div>
                <!-- Row end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    <div id="styleSelector">

    </div>
</div>
</div>
</div>
</div>
</div>
</div>



<script>
    function desativar_cupom(id){
        var id_cupom = id;
        window.location="./desativar_cupom?id=" + id_cupom;
    }
</script>

            



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
<script src="assets/js/script_dashboard.js"></script>
</body>

</html>