<?php include 'header.php'; 

include "../conn.php";

$consulta_produtos  = $conn->query("SELECT * FROM produtos");
$lista_produtos = [];
while($lista_produtos[] = $consulta_produtos->fetch_assoc());

?>
<div class="pcoded-content">
    <!-- Page-header start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                        <?php include 'searchBar.php';?>
                </div>
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
                            <div class="container-mostrar-produto">
                                <ul>
                                    <?php 
                                        foreach($lista_produtos as $key){ ?>
                                            <a href="mod_produto?p=2.2&pd=<?php echo $key['id']; ?>">
                                                <li class="produto__item">
                                                        <img src="../<?php echo $key['capa'] ?>" alt="pd">
                                                        <div>&nbsp;<?php echo $key['titulo']; ?> </div>
                                                </li>
                                            </a>
                                        <?php } ?>
                                        
                                </ul>
                            </div>
                    </div>

                    <style>
                        .produto__item{
                                height: 160px;
                                display: flex;
                                border-bottom: 1px solid #ccc;
                        }
                        .produto__item div{
                                display: flex;
                                align-items: center;
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