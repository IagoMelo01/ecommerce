<!-- <div><pre>
<?php 
        include '../conn.php';

        $id_modificar = $_GET['pd'];    //extrai o id do produto a ser modificado por GET


            // query para buscar informações do produto
        $produto_modificar = $conn->query("SELECT * FROM produtos WHERE id = '$id_modificar'");
        $produto_modificar = $produto_modificar->fetch_assoc();

        

        print_r($_POST); 
        print_r($_FILES);

         if(isset($_POST['produto'])){
            $referencia = rand(0, 99999);
            $tituloUTF = $produto_modificar['titulo'];
            $valor = $_POST['valor'];
            $altura = $_POST['altura'];
            $largura = $_POST['largura'];
            $comprimento = $_POST['comprimento'];
            $peso = $_POST['peso'];
            $corCont = $_POST['corCont'];
            $cPrincipal = $_POST['cor1'];
            $descricao = $_POST['descricao'];

            $texto = $tituloUTF; 

            $produto = "";      // Recebe o título em binario

            $numerosBinario = Array("0000", "0001", "0010", "0011", "0100", "0101","0110", "0111", "1000", "1001", "1010", "1011", "1100", "1101", "1110", "1111");
            // ordena as combinações em binário
            for ($i = 2;$i <=7;$i++){
                for ($j = 0;$j <=15;$j++){
                    $binario[] = " ".$numerosBinario[$i]." ".$numerosBinario[$j]; 
                }
            }
            
            // atribui ao array $glifos todos os caracteres imprimiveis da tabela ASCII
            for ( $i=32; $i <= 126; $i++ ) {
                    $glifos[] = chr($i); //funçao chr, retorna um caracter, de acordo com seu código na base Decimal 
            }
            
            // converte dados enviados pelo usuário para binário
            for($i = 0;$i <(strlen($texto));$i++){
                
                foreach ($glifos as $key => $value){
                
                    if($texto[$i] == $value){
                        $produto = $produto . $binario[$key]; 
                    }
                    
                }
            }


            $pasta = "../www/produtos/" . str_replace(' ', '_', $produto) . $referencia;

            mkdir($pasta, 0700);
            
            $dirCapa = "../www/capas/";
            $uploadfile = $dirCapa . basename($referencia . str_replace(' ', '_', $_FILES['capa']['name']));

            move_uploaded_file($_FILES['capa']['tmp_name'], $uploadfile);

            $capa = str_replace('../', '',$uploadfile);


            $conn->query("INSERT INTO `produtos`( `titulo`, `capa`, `corPrincipal`, `descricao`, `categoria`, `subcategoria`, `vendidos`, `comprimento`, `peso`, `altura`, `largura` , `valor`) VALUES ( '$produto', '$capa', '$cPrincipal', '$descricao', '1', '1', '0', '$comprimento', '$peso', '$altura', '$largura', '$valor')");
            $ref = $conn->query("SELECT * FROM produtos WHERE 1 ORDER BY id DESC LIMIT 1");
            $ref = $ref->fetch_array(MYSQLI_ASSOC);
            $idRef = $ref['id'];
            echo $idRef . '<br>';

            

            $controleCor = 1;
            $cor = 'cor' . $controleCor;

            while(isset($_POST[$cor])){
                echo '<br>'.$cor . '<br>';
                $cadCor = $_POST[$cor];

                $pastaCor = $pasta . '/' . str_replace(' ', '_', $cadCor);

                $conn->query("INSERT INTO `cores`( `cor`, `referencia`, `fotos`) VALUES ( '$cadCor', '$idRef', '$pastaCor')");
                $refCor = $conn->query("SELECT * FROM cores WHERE 1 ORDER BY id DESC LIMIT 1");
                $refCor = $refCor->fetch_array(MYSQLI_ASSOC);
                $idCor = $refCor['id'];

               

                mkdir($pastaCor, 0700);
                $arq = 'arq' . $controleCor;

                $controle = 0;

                foreach( $_FILES[$arq]['name'] as $key){


                    print_r($key);

                    $dir = $pastaCor . '/';

                    $uploadfile = $dir . $referencia . basename($key);

                    move_uploaded_file($_FILES[$arq]['tmp_name'][$controle], $uploadfile);

                    $controle++;

                }

                

                $controleTam = 1;
                $tam = 'tam' . $controleTam;
                while(isset($_POST[$tam])){
                    $control = 'ref' . $controleTam;
                    if($_POST[$control] == $controleCor){
                        echo $tam. '<br>';
                        $tamanho = $_POST[$tam];
                        $qtd = 'qtd' . $controleTam;
                        $quantidade = $_POST[$qtd];
                        $conn->query("INSERT INTO `tamanhos`(`tamanho`, `referencia`, `quantidade`) VALUES ('$tamanho', '$idCor', '$quantidade')");
                    }
                    
                    $controleTam++;
                    $tam = 'tam' . $controleTam;
                }


                $controleCor++;
                $cor = 'cor' . $controleCor;
            }

        }
    ?>

</pre></div> -->


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


<!-- _______________________________________________________________________________________  INFORMAÇÕES DO PRODUTO  __________________________________________________________________ -->




<!-- Input com o id do produto -->

<input type="hidden" name="id_produto" id="id_produto" value="<?php echo $id_modificar; ?>">

<!-- ------------------------- -->


<!-- Modal editar info -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalInfo">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar Informações</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalInfo" data-toggle="modal" data-target="#modalInfo" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="nome_novo" placeholder="">
            <label for="nome_novo">Nome do produto:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4 pr" id="valor_novo" placeholder="">
            <label for="valor_novo">Valor:</label>
          </div>
          
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarInfo()" type="button">Salvar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar dimensões -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalDim">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar dimensões</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalDim" data-toggle="modal" data-target="#modalDim" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="altura_nova" placeholder="">
            <label for="altura_nova">Altura:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="largura_nova" placeholder="">
            <label for="largura_nova">Largura:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="comprimento_novo" placeholder="">
            <label for="comprimento_novo">Comprimento:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="peso_novo" placeholder="">
            <label for="peso_novo">Peso:</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarDimensoes()" type="button">Salvar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar capa -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalCapa">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar Capa</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalCapa" data-toggle="modal" data-target="#modalCapa" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <input type="file" class="form-control rounded-4" id="capa_nova" placeholder="">
            <label for="capa_nova">Foto da Capa:</label>
          </div>
          
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCapa()" type="button">Salvar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar descrição -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalDesc">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar descrição</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalDesc" data-toggle="modal" data-target="#modalDesc" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <textarea maxlength="64000" rows="12" class="form-control rounded-4" id="descricao_nova" placeholder=""></textarea>
            <label for="descricao_nova">Descrição:</label>
          </div>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarDescricao()" type="button">Salvar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- ________________________________________________________________________________  TAMANHO  ______________________________________________________________________ -->


<!-- Modal adicionar tamanho -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalTam">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Adicionar tamanho</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalTam" data-toggle="modal" data-target="#modalTam" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="tamanho_novo" placeholder="">
            <label for="tamanho_novo">Tamanho:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="quantidade_nova" placeholder="">
            <label for="quantidade_nova">Quantidade:</label>
          </div>
          <input type="hidden" name="idCorAlvo" id="idCorAlvo">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarTamanho()" type="button">Adicionar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- Modal Editar tamanho -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalEdTam">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar tamanho</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalEdTam" data-toggle="modal" data-target="#modalEdTam" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="EdTamNome" placeholder="">
            <label for="EdTamNome">Tamanho:</label>
          </div>
          <div class="form-floating mb-3">
            <input readonly type="text" class="form-control rounded-4" id="quantidadeAtual" placeholder="">
            <label for="quantidadeAtual">Quantidade:</label>
          </div>
          <div class="form-floating mb-3">
              Operação:
              <select class="form-control form-primary" name="operacao" id="EdTamOperacao">
                  <option value="1">Somar</option>
                  <option value="2">Subtrair</option>
              </select>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="EdTamValorOperacao" placeholder="">
            <label for="EdTamValorOperacao">Valor:</label>
          </div>
          <input type="hidden" name="idEdTam" id="idEdTam">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="AlterarTamanho()" type="button">Salvar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- __________________________________________________________________________________  COR  ________________________________________________________________________ -->


<!-- Modal adicionar Cor -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalCor">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Adicionar Cor</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalCor" data-toggle="modal" data-target="#modalCor" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" id="formNovaCor" action="script" enctype="multipart/form-data" method="post">

          <div class="form-floating mb-3">
            <input type="file" name="arquivos[]" class="form-control rounded-4" id="arquivos_cor" maxlength="6" multiple>
            <label for="arquivos_cor">Fotos:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="nova_cor" name="nova_cor" placeholder="">
            <label for="nova_cor">Cor:</label>
          </div>
          <input type="hidden" name="id_produto" id="idProduto" value="<?php echo $id_modificar; ?>">
          <input type="hidden" name="funcao" id="funcao" value="adicionar_cor_existente">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCor()" type="button">Adicionar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar Cor -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalCor">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Adicionar Cor</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalCor" data-toggle="modal" data-target="#modalCor" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" id="formNovaCor" action="script" enctype="multipart/form-data" method="post">

          <div class="form-floating mb-3">
            <input type="file" name="arquivos[]" class="form-control rounded-4" id="arquivos_cor" maxlength="6" multiple>
            <label for="arquivos_cor">Fotos:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="nova_cor" name="nova_cor" placeholder="">
            <label for="nova_cor">Cor:</label>
          </div>
          <input type="hidden" name="id_produto" id="idProduto" value="<?php echo $id_modificar; ?>">
          <input type="hidden" name="funcao" id="funcao" value="adicionar_cor_existente">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCor()" type="button">Adicionar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- ____________________________________________________________________________________________________________________________________________________________________________________ -->



    <div class="pcoded-content">
        <!-- Page-header start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Modificar Produto</h5>
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
                    <div class="page-body breadcrumb-page">
                        <!-- Simple Breadcrumb card start -->
                        <div class="card-block">
                            <form class="form-material" action="" enctype="multipart/form-data" method="post">
                                <div class="form-group form-inverse form-static-label">
                                    <input readonly type="text" name="produto" class="form-control" value="<?php echo $produto_modificar['titulo']; ?>">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Nome do produto</label>
                                </div>   
                                <div class="form-group form-inverse form-static-label">
                                    <input readonly type="text" name="valor" class="form-control pr" value="<?php echo $produto_modificar['valor']; ?>">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Valor</label>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="editarInfo('<?php echo $produto_modificar['titulo']?>' , '<?php echo $produto_modificar['valor']; ?>')" data-toggle="modal" data-target="#modalInfo">
                                    <span class="bi-pencil-square"></span>  
                                    <br>
                                    <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                        Editar info produto
                                    </label>
                                </button> 
                                <div>
                                    <h6>Dimensões:</h6>
                                </div>
                                <div class="row">
                                    <div style="margin: 0 2%;" class="form-group col form-inverse form-static-label">
                                        <input readonly type="text" name="altura" class="form-control " value="<?php echo $produto_modificar['altura']; ?>">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Altura</label>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-inverse form-static-label" >
                                        <input readonly type="text" name="largura" class="form-control" value="<?php echo $produto_modificar['largura']; ?>">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Largura</label>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-inverse form-static-label" >
                                        <input readonly type="text" name="comprimento" class="form-control" value="<?php echo $produto_modificar['comprimento']; ?>">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Comprimento</label>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="form-group col-md-9 form-inverse form-static-label ">
                                        <input readonly type="text" name="peso" class="form-control" value="<?php echo $produto_modificar['peso']; ?>">
                                        <span class="form-bar"></span>
                                        <label class="float-label">Peso: (g)</label>
                                        
                                    </div>
                                    <button class="btn btn-primary" type="button" onclick="editarDim(<?php echo $produto_modificar['altura'] . ',' . $produto_modificar['largura'] . ',' . $produto_modificar['comprimento'] . ',' . $produto_modificar['peso']; ?>)" data-toggle="modal" data-target="#modalDim">
                                        <span class="bi-pencil-square"></span>  
                                        <br>
                                        <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                            Editar dimensões do produto
                                        </label>
                                    </button> 
                                </div>
                                
                                

                                
                                <div class="form-group form-inverse form-static-label">
                                    <h6>Foto de capa:</h6>
                                    <img style="height:100px;" src="../<?php echo $produto_modificar['capa']; ?>" alt="">
                                    <button class="btn btn-primary" type="button" onclick="editarCapa()" data-toggle="modal" data-target="#modalCapa">
                                        <span class="bi-pencil-square"></span>  
                                        <br>
                                        <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                            Editar foto
                                        </label>
                                    </button> 
                                </div>
                                <div class="form">
                                    <p class="font-weight-bold">Descrição do produto:</p>
                                    <textarea style="height: 6rem;" readonly maxlength="64000" rows="6" name="descricao" class="form-control" ><?php echo $produto_modificar['descricao']; ?></textarea>
                                    <span class="form-bar"></span>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="editarDescricao()" data-toggle="modal" data-target="#modalDesc">
                                    <span class="bi-pencil-square"></span>  
                                    <br>
                                    <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                        Editar Descrição 
                                    </label>
                                </button> 
                                <br>
                                <hr color="navy">
                                <br>
                                <h5>Cores e tamanhos:</h5>
                                <div class="subcontainer" id="addCor">
                                    
                                
                                    <input type="hidden" name="corCont" id="corCount" value="1">
                                    <input type="hidden" name="tamCont" id="tamCount" value="1">

                                    <?php 
                                        
                                        $listar_cores_query = $conn->query("SELECT * FROM `cores` WHERE `referencia` = '$id_modificar' AND `situacao` = '0' ");
                                        $lista_cores = [];
                                        while($lista_cores[] = $listar_cores_query->fetch_assoc())

                                        $flowcontrol_lc = 1;       // controle de fluxo da lista_cores
                                        foreach($lista_cores as $key){
                                            if(!empty($key)){
                                                //echo '<div><pre>';
                                                $path = $key['fotos'];
                                                //echo $path;
                                                $diretorio = dir($path);
                                                $arquivos = [];
                                                //echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
                                                    while($arquivo = $diretorio -> read()){
                                                        $arquivos[]= "$arquivo";
                                                    }
                                                $diretorio -> close();

                                                //print_r($arquivos);
                                    
                                    ?>

                                    

                                                <div class="cor<?php echo $flowcontrol_lc; ?>" id="cor<?php echo $flowcontrol_lc; ?>">
                                                    <div class="form-group form-inverse form-static-label">
                                                        <input type="text" name="cor1" value="<?php echo $key['cor']; ?>" class="form-control">
                                                        <span class="form-bar"></span>
                                                        <label class="float-label">Cor</label>
                                                    </div>
                                                    <div class="form-group form-inverse form-static-label">
                                                        <h6>Fotos do produto:</h6>
                                                        <div class="row">
                                                            <?php foreach($arquivos as $foto){ ?>
                                                                <img style="height:100px;" src="<?php echo $key['fotos'] . '/' . $foto; ?>" alt="">
                                                            <?php } ?>
                                                        </div>
                                                        <!-- <input type="file" name="arq1[]" class="arq form-control " maxlength="6" multiple> -->
                                                    </div>
                                                    
                                                                <div class="container row" id="tcor<?php echo $flowcontrol_lc; ?>">

                                                                    <?php
                                                                        $ref_tamanho = $key['id'];
                                                                        $listar_tamanhos_query = $conn->query("SELECT * FROM `tamanhos` WHERE `referencia` = '$ref_tamanho' AND `situacao` != 1");
                                                                        $lista_tamanhos = [];
                                                                        while($lista_tamanhos[] = $listar_tamanhos_query->fetch_assoc());

                                                                        $flowcontrol_lt = 1;        //  lt = lista tamanhos
                                                                        foreach($lista_tamanhos as $key_tamanho){
                                                                            if(!empty($key_tamanho)){
                                                                    ?>
                                                                        <div class="container row">

                                                                        

                                                                            <div class="form-group col form-inverse form-static-label">
                                                                                <input readonly value="<?php echo $key_tamanho['tamanho']; ?>" type="text" name="tam1" class="form-control">
                                                                                <span class="form-bar"></span>
                                                                                <label class="float-label">Tamanho</label>
                                                                            </div>
                                                                            <div class="form-group col form-inverse form-static-label">
                                                                                <input readonly value="<?php echo $key_tamanho['quantidade']; ?>"type="text" name="qtd1" class="form-control">
                                                                                <span class="form-bar"></span>
                                                                                <label class="float-label">quantidade</label>
                                                                            </div>
                                                                            <button class="btn btn-primary" style="border-radius: 5px; margin: 1%; padding:0" type="button" onclick="editarTamanho(<?php echo $key_tamanho['id']; ?>)" data-toggle="modal" data-target="#modalEdTam"><span class="bi-pencil-square"></span><br><label style="padding: 0; margin: 0;" for="#btnExcluir">Editar</label></button>
                                                                            <button id="btnExcluir" class="btn btn-danger" style="border-radius: 5px; margin: 1%; padding:0" type="button" onclick="excluirTamanho(<?php echo $key_tamanho['id']; ?>)"><span style="text-color: red" class="bi-x-square"></span><br><label style="padding: 0; margin: 0;" for="#btnExcluir">Excluir</label></button>
                                                                            <input type="hidden" name="ref1" value="1">
                                                                            
                                                                                
                                                                        </div>
                                                                
                                                                    <?php
                                                                                $flowcontrol_lt++;
                                                                            } else { ?>
                                                                            <div class="container row">
                                                                                <div class="col">
                                                                                    <button type="button" class="btn btn-primary form-static-label" id="tcor1btn10" onclick="adcTamanhoExistente('<?php echo $key['id']; ?>')" data-toggle="modal" data-target="#modalTam">Adicionar Tamanho</button>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="button" class="btn btn-danger form-static-label" id="tcor1btn10" onclick="excluirCor(<?php echo $key['id']; ?>)">Excluir Cor</button>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="button" class="btn btn-success form-static-label" id="tcor1btn10" onclick="editarCor('<?php echo $key['id']; ?>')" data-toggle="modal" data-target="#modalTam">Editar Cor</button>
                                                                                </div>
                                                                            </div>
                                                                          <?php  } 
                                                                        }
                                                                    ?>
                                                                    
                                                                </div>
                                                                
                                                    <div id="addTam1">

                                                    </div>
                                                </div>
                                                <hr class="primary"><br>

                                        <?php
                                                    $flowcontrol_lc++;
                                                }
                                            }
                                        ?>
                                            
                                            
                                        
                                       
                                        
                                    
                                        
                                    
                                    <button type="button" class="btn btn-success " id="tcor1btn10" onclick="adcCorExistente('<?php echo $key['id']; ?>')" data-toggle="modal" data-target="#modalCor">Adicionar Cor</button>
                                    
                                    
                                </div>
                                
                                <br><br>
                                <div class="container">
                                    <div class="row">
                                        <input style="font-weight: bold" class="btn-lg col-md-7 container btn-info" type="submit" value="SALVAR">
                                        <div class="col-md-1"></div>
                                        <button style="font-weight: bold" onclick="excluir_produto(<?php echo $_GET['pd'] ?>)" class="btn-lg col-md-4 container btn-danger" type="button" value="">EXCLUIR PRODUTO</button>
                                    </div>
                                    
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
<script src="../js/script.js"></script>
<script src="../js/jquery.mask.js"></script>
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
