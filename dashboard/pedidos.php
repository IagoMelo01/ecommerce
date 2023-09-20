<?php include 'header.php';
include "../conn.php";

$consulta_pedidos = $conn->query("SELECT * FROM vendas");
$lista_pedidos = [];
if($consulta_pedidos)
    while($lista_pedidos[] = $consulta_pedidos->fetch_assoc());


?>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Pedidos</h5>
                                            <p class="m-b-0">&nbsp;</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                        <!-- Inverse table card end -->
                                        <!-- Hover table card start -->
                                        <div class="card">
                                            <div class="card-header">
                                                <h5>Pedidos</h5>
                                                <!--<div class="card-header-right">
                                                    <ul class="list-unstyled card-option">
                                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                                        <li><i class="fa fa-trash close-card"></i></li>
                                                    </ul>
                                                </div>-->
                                            </div>
                                            <div class="card-block table-border-style">
                                                <div class="table-responsive">
                                                    <table class="table table-hover">

                                                        
                                                        <thead>
                                                            <tr>
                                                                <th>&nbsp;</th>
                                                                <th>Nome</th>
                                                                <th>Endereço</th>
                                                                <th>Data</th>
                                                            </tr>
                                                        </thead>
                                                        
                                                        <tbody>
                                                            <?php $lista_ref = 1; foreach($lista_pedidos as $key){if(!empty($key)){ 
                                                                $id_usuario = $key['usuario'];
                                                                $usuario = $conn->query("SELECT * FROM usuarios WHERE id = '$id_usuario'");
                                                                if($usuario)
                                                                    $usuario = $usuario->fetch_assoc();
                                                                
                                                            ?>
                                                                
                                                                <tr>
                                                                <th scope="row"><a href="pedido?p=4&pedido=<?php echo $key['id'] ?>"><?php echo $lista_ref ?></a></th>
                                                                    <td><a href="pedido?p=4&pedido=<?php echo $key['id'] ?>"><?php echo $usuario['nome']; ?></a></td>
                                                                    <td><a href="pedido?p=4&pedido=<?php echo $key['id'] ?>"><?php echo $key['endereco']; ?></a></td>
                                                                    <td><a href="pedido?p=4&pedido=<?php echo $key['id'] ?>"><?php echo date('d/m/Y', $key['data']); ?></a></td>
                                                                </tr>
                                                            <?php $lista_ref++; }} ?>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Gustavo Muller</td>
                                                                <td>Rua beco são paulo, 30, Jk, Paracatu-MG</td>
                                                                <td>12/05/2021</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                            </div>
                            <!-- Main-body end -->

                            <div id="styleSelector">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 10]>
    <div class="ie-warning">
        <h1>Warning!!</h1>
        <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
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
    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>
