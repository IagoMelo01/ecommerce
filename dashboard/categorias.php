

<?php include 'header.php'; ?>

<?php 

include '../conn.php';

if(isset($_POST['ctrl'])){
    $ctref = 1;
    while(isset($_POST['categ'.$ctref])){
        $cadcat = $_POST['categ'.$ctref];
        $conn->query("INSERT INTO `categorias`(`categoria`) VALUES ('$cadcat')");

        $cadCatRef = $conn->query("SELECT * FROM categorias ORDER BY id DESC LIMIT 1");
        $cadCatRef = mysqli_fetch_assoc($cadCatRef);
        $sctref = 1;
        while(isset($_POST['subCateg'.$sctref])){
            $idct = $cadCatRef['id'];
            $cadSct = $_POST['subCateg'.$sctref];
            if($_POST['refer'.$sctref] == $ctref){
                $conn->query("INSERT INTO `subcategorias`( `subcategoria`, `referencia`) VALUES ('$cadSct', '$idct')");
            }
            $sctref++;
        }
        $ctref++;
    }
} else if(isset($_POST['alterar'])){
    $referencia_alterar = 1;
    while(isset($_POST['catcd' . $referencia_alterar])){
        $alterar_categoria = $_POST['catcd' . $referencia_alterar];
        $id_alterar_categoria = $_POST['catid' . $referencia_alterar];

        $conn->query("UPDATE categorias SET `categoria`='$alterar_categoria' WHERE id = '$id_alterar_categoria'");

        $referencia_alterar_subcategoria = 1;
        while(isset($_POST['subcatcd'. $referencia_alterar_subcategoria])){

            $alterar_subcategoria = $_POST['subcatcd'. $referencia_alterar_subcategoria];
            $id_alterar_subcategoria = $_POST['subcatid'. $referencia_alterar_subcategoria];

            $conn->query("UPDATE subcategorias SET `subcategoria`='$alterar_subcategoria' WHERE id = '$id_alterar_subcategoria'");

            $referencia_alterar_subcategoria++;
        }


        $referencia_alterar++;
    }

    $referencia_adicionar_subc = 1;
    while(isset($_POST['adcsubcat' . $referencia_adicionar_subc])){
        $adicionar_existente = $_POST['adcsubcat' . $referencia_adicionar_subc];
        $ref_adicionar_exitente = $_POST['adcsubcatref' . $referencia_adicionar_subc];

        $conn->query("INSERT INTO `subcategorias`( `subcategoria`, `referencia`) VALUES ('$adicionar_existente', '$ref_adicionar_exitente')");

        $referencia_adicionar_subc++;
    }
}

if(isset($_GET['exsubc'])){
    $excluir_subcategoria_id = $_GET['exsubc'];
    $conn->query("DELETE FROM subcategorias WHERE id = '$excluir_subcategoria_id'");
}

if(isset($_GET['exct'])){
    $excluir_categoria_id = $_GET['exct'];
    $conn->query("DELETE FROM categorias WHERE id = '$excluir_categoria_id'");
    $conn->query("DELETE FROM subcategorias WHERE referencia = '$excluir_categoria_id'");
}

?>


                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
                            <div class="page-block">
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="page-header-title">
                                            <h5 class="m-b-10">Categorias</h5>
                                            <p class="m-b-0">Gerencie suas categorias por aqui.</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="./"> <i class="fa fa-home"></i> </a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Painel de controle</a>
                                            </li>
                                            <li class="breadcrumb-item"><a href="#!">Categorias</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <!-- Page body start -->
                                    <div class="page-body">
                                        <div class="row">
                                            <div class="col-md">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h5>Alterar categorias e subcategorias</h5>
                                                        <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                    </div>
                                                    <div class="card-block">

                                                        <form class="form-material" action="categorias" method="post">
                                                            <input type="hidden" name="alterar" value="1">
                                                            <input id="adicionar_subc_existente" type="hidden" value="0" name="ref_subc_existente">
                                                            <?php 
                                                                $consultCtp = $conn->query("SELECT * FROM categorias WHERE 1");
                                                                while($consultCt[] = $consultCtp->fetch_assoc());
                                                                $ctrlCt = 1;
                                                                foreach($consultCt as $key){
                                                                    if(!empty($key)){ ?>

                                                                        <div class="form-group form-primary">
                                                                            <div class="inline">
                                                                                <a class="icone_x_categorias" href="?exct=<?php echo $key['id'] ?>"><span class="bi-x-square"></span></a>
                                                                                <input class="form-control " type="text" name="catcd<?php echo $ctrlCt?>" value="<?php echo $key['categoria']; ?>">
                                                                            </div>
                                                                            <input id="referencia_categoria<?php echo $ctrlCt;?>" class="form-control " type="hidden" name="catid<?php echo $ctrlCt . '" value="' . $key['id'] . '"'; ?>">
                                                                            <div id="adc_subcategoria<?php echo $ctrlCt; ?>" class="container">

                                                                                <?php
                                                                                    $consultSct = [];
                                                                                    $rsb = $key['id'];
                                                                                    $consultSCtp = $conn->query("SELECT * FROM subcategorias WHERE referencia = '$rsb'");
                                                                                    while($consultSct[] = $consultSCtp->fetch_assoc());
                                                                                    $controle_subc = 1;
                                                                                    foreach($consultSct as $subkey){ 
                                                                                        if(!empty($subkey)){?>
                                                                                            <input class="form-control " type="hidden" name="subcatid<?php echo $controle_subc . '" value="' . $subkey['id'] . '"'; ?>">
                                                                                            <div class="inline">
                                                                                                <a class="icone_x_categorias" href="?exsubc=<?php echo $subkey['id'] ?>"><span class="bi-x-square"></span></a>
                                                                                                <input class="form-control " type="text" name="subcatcd<?php echo $controle_subc; ?>" value="<?php echo $subkey['subcategoria']; ?>">
                                                                                            </div>
                                                                                            
                                                                                <?php $controle_subc++;  }} ?>
                                                                            </div>
                                                                            <br>
                                                                            <div class="container">
                                                                                <button type="button" onclick="adicionar_subcat_existente(<?php echo $ctrlCt;?>)" class="btn">Adicionar subcategoria</button>
                                                                            </div>
                                                                        </div>

                                                            <?php $ctrlCt++; }} ?>

                                                            <hr>
                                                            <button class="btn btn-inverse" type="submit">Salvar alterações</button>
                                                        </form>

                                                        <hr class="btn-inverse"><hr class="btn-primary"><hr class="btn-inverse">
                                                            
                                                        <form class="form-material" action="categorias" method="post">

                                                            <div class="card-header">
                                                                <h5>Adicionar categorias e subcategorias</h5>
                                                                <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                                                            </div>

                                                            <input type="hidden" name="ctrl" value="1">
                                                            <input type="hidden" name="contCat" id="contCat" value="1">
                                                            <input type="hidden" name="contSubCat" id="contSubCat" value="1">
                                                            <div id="addCateg">
                                                                <div class="form-group form-primary">
                                                                    <input type="text" name="categ1" class="form-control ">
                                                                    <span class="form-bar"></span>
                                                                    <label class="float-label">Categoria</label>
                                                                </div>
                                                                <div id="sub1" class="container">
                                                                    <input type="hidden" name="refer1" value="1">
                                                                    <div class="form-group form-primary">
                                                                        <input type="text" name="subCateg1" class="form-control ">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Subcategoria</label>
                                                                    </div>
                                                                    <br>
                                                                </div>
                                                                <div class="container">
                                                                    <button type="button" onclick="addSubCateg(1)" class="btn">Adicionar subcategoria</button>
                                                                </div>
                                                                <br>
                                                                <hr style="background-color: cyan;"> 
                                                            </div>
                                                            <button type="button" onclick="addCat()" class="btn btn-primary">Adicionar Categoria</button>
                                                            <br><br><hr><br>
                                                            <button type="submit" class="btn  btn-inverse">Salvar novas categorias</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                        
                                    </div>
                                    <!-- Page body end -->
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
    <script src="../js/script.js"></script>
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
