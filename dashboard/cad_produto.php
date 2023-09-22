<?php 

        include_once '../setup/conn.php';

        function tirarAcentos($string){
            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
        }


        

         if(isset($_POST['produto'])){
            $referencia = rand(0, 999999);
            $tituloUTF = $_POST['produto'];  //Recebe o titulo cadastrado
            $valor = $_POST['valor'];
            $altura = $_POST['altura'];
            $largura = $_POST['largura'];
            $comprimento = $_POST['comprimento'];
            $peso = $_POST['peso'];
            $corCont = $_POST['corCont'];       // Referencia na contagem de cores cadastradas
            $cPrincipal = $_POST['cor1'];       // Cor na qual o produto é exibido nativamente
            $descricao = $_POST['descricao'];
            $categoria = $_POST['categoria'];
            $subcategoria = $_POST['subcategoria'];
            
            $texto = $tituloUTF; 

            $produto = tirarAcentos($tituloUTF);      // Recebe o título sem acentos

            
            $time_reference = time();

            //substitui os espaços por '_' para criar as pastas
            $pasta = "../www/produtos/" . str_replace(' ', '_', $produto) . '__' . $referencia . '-' . $time_reference;

            
            //cria a pasta do produto
            mkdir($pasta, 0777);
            
            $dirCapa = "../www/capas/";     // diretorio onde sera salva a foto de capa
            $uploadfile = $dirCapa . basename($referencia . str_replace(' ', '_', $_FILES['capa']['name'])); // faz o upload do arquivo

            // extrai o aquivo da supervariavel FILES do formulario
            move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile);

            $capa = str_replace('../', '',$uploadfile);


            $conn->query("INSERT INTO `produtos`( `titulo`, `capa`, `corPrincipal`, `descricao`, `categoria`, `subcategoria`, `vendidos`, `comprimento`, `peso`, `altura`, `largura` , `valor`, `pasta`, `referencia`) VALUES ( '$tituloUTF', '$capa', '$cPrincipal', '$descricao', '$categoria', '$subcategoria', '0', '$comprimento', '$peso', '$altura', '$largura', '$valor', '$pasta', '$time_reference')");
            $ref = $conn->query("SELECT * FROM produtos WHERE `referencia` = '$time_reference' ORDER BY id DESC LIMIT 1");
            print_r($ref);
            echo "-- end ref --";
            $ref = $ref->fetch_array(MYSQLI_ASSOC);
            $idRef = $ref['id'];
            echo $idRef . '<br>';

            

            $controleCor = 1;
            $cor = 'cor' . $controleCor;

            echo '<script> window.location.href="./mod_produto?p=2.2&pd=' . $idRef . '" </script>';

        }
    ?>




<?php 

    include 'header.php'

?>

<style>
.arq {
	background-color: transparent;
    border-color: rgb(68,138,255);
}

.color-bk{
    color: black;
}

</style>
    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Cadastrar Produto</h5>
                            <p class="m-b-0">_</p>
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
                    <div class="page-body breadcrumb-page">
                        <!-- Simple Breadcrumb card start -->
                        <div class="card-block">
                            <form class="form-material" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group form-primary">
                                    <input type="text" name="produto" maxlength="200" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nome do produto</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="text" name="valor" class="form-control pr">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Valor</label>
                                </div>
                                <div>
                                    <h6>Dimensões:  <i> (Referentes ao pacote de envio)</i></h6>
                                </div>
                                <div class="row">
                                    <div style="margin: 0 2%;" class="form-group col form-primary">
                                        <input type="text" name="altura" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Altura</label>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-primary">
                                        <input type="text" name="largura" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Largura</label>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-primary">
                                        <input type="text" name="comprimento" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Comprimento</label>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="form-group form-primary">
                                    <input type="text" name="peso" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Peso: (g)</label>
                                </div>

                                
                                <div class="form-group form-primary">
                                    <h6>Foto de capa:</h6>
                                    <input onchange="preview()" id="imgCapa" type="file" name="capa" accept=".jpg,.png,.jpeg,.webp" class="form-control arq">
                                    <img id="imgPreview" style="height:100px;" src="#" alt="">
                                </div>
                                <div class="form-group form-primary">
                                <textarea style="height: 6rem;" maxlength="64000" rows="6" name="descricao" id="descricao" class="form-control" ></textarea>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Descrição do produto:</label>
                                </div>

                                <h6>Categoria e subcategoria:</h6>
                                <div class="row">
                                    <div style="margin: 0 2%;" class="form-group col form-primary">

                                        <select class="form-control" name="categoria" id="categoria">
                                            <?php
                                                $consulta_categorias = $conn->query("SELECT * FROM categorias");
                                                $lista_categorias = [];
                                                while($lista_categorias[] = $consulta_categorias->fetch_assoc());

                                                foreach($lista_categorias as $key){
                                                    if(!empty($key)){
                                                        $referencia_categoria = $key['id'];
                                                        
                                            ?>
                                                    
                                                     
                                                    <option value="<?php echo $key['id']; ?>"><?php echo $key['categoria']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-primary">
                                    
                                    
                                        <select class="form-control" name="subcategoria" id="subcategoria_select">
                                            <?php
                                                $lista_subcategorias = [];
                                                $consulta_subcategoria = $conn->query("SELECT * FROM subcategorias WHERE 1");
                                                while($lista_subcategorias[] = $consulta_subcategoria->fetch_assoc());

                                                foreach($lista_subcategorias as $subkey){
                                                    if(!empty($subkey)){
                                            ?>
                                                    <option value="<?php echo $subkey['id']; ?>"><?php echo $subkey['subcategoria']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <hr color="navy">
                                <!-- <br>
                                <h5>Cores e tamanhos:</h5>
                                <div class="subcontainer" id="addCor">


                                    <input type="hidden" name="corCont" id="corCount" value="1">
                                    <input type="hidden" name="tamCont" id="tamCount" value="1">

                                    
                                    
                                    <div class="cor1" id="cor1">
                                        <div class="form-group form-primary">
                                            <input type="text" name="cor1" class="form-control">
                                            <span class="form-bar"></span>
                                            <label class="float-label">Cor</label>
                                        </div>
                                        <div class="form-group form-primary">
                                            <h6>Fotos do produto:</h6>
                                            <input type="file" name="arq1[]" class="arq form-control " maxlength="6" multiple>
                                        </div>
                                        <div class="container row" id="tcor1">
                                            <div class="form-group col form-primary">
                                                <input type="text" name="tam1" class="form-control">
                                                <span class="form-bar"></span>
                                                <label class="float-label">Tamanho</label>
                                            </div>
                                            <div class="form-group col form-primary">
                                                <input type="text" name="qtd1" class="form-control">
                                                <span class="form-bar"></span>
                                                <label class="float-label">quantidade</label>
                                            </div>
                                            <input type="hidden" name="ref1" value="1">
                                            <div class="col">
                                                <button type="button" class="btn btn-primary form-static-label" id="tcor1btn10" onclick="adcTamanho('1')">Adicionar Tamanho</button>
                                            </div>
                                        </div>
                                        <div id="addTam1">

                                        </div>
                                    
                                    
                                    
                                    
                                
                                    
                                    </div>
                                    
                                    
                                    
                                </div> -->
                                <!-- <div class="col-4">
                                    <button type="button" class="btn btn-success" onclick="adcCor()">Adicionar Cor</button>
                                </div>
                                <br><br> -->
                                <div class="container">
                                    <input style="font-weight: bold" class="btn-lg container btn-info" type="submit" value="SALVAR">
                                </div>
                                
                            </form>
                        </div>
                        <!-- Success-color Breadcrumb card end -->
                    </div>
                    <!-- Page-body start -->
                </div>
            </div>
            <!-- Main-body start -->

            <div id="styleSelector">

            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script>

function preview() {
  const [file] = imgCapa.files
  if (file) {
    imgPreview.src = URL.createObjectURL(file)
  }
}

</script>


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
<script src="assets/js/script_dashboard.js"></script>
<script src="../assets/libs/jQuery/jquery.mask.js"></script>
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
