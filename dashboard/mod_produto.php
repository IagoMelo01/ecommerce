<!-- <div><pre>
<?php 
        include '../conn.php';

        $id_modificar = $_GET['pd'];    //extrai o id do produto a ser modificado por GET


            // query para buscar informações do produto
        $produto_modificar = $conn->query("SELECT * FROM produtos WHERE id = '$id_modificar'");
        $produto_modificar = $produto_modificar->fetch_assoc();

        print_r($produto_modificar);

        
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
          
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCapa('../<?php echo $produto_modificar['capa']; ?>')" type="button">Salvar</button>
          
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



<!-- Modal editar categoria e subcategoria -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalCat">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar Categoria e subcategoria</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalCat" data-toggle="modal" data-target="#modalCat" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="">
          <div class="form-floating mb-3">
            <select readonly class="form-control" id="categoriaNova" name="categoria" >
                <?php
                    $consulta_categorias = $conn->query("SELECT * FROM categorias");
                    $lista_categorias = [];
                    while($lista_categorias[] = $consulta_categorias->fetch_assoc());

                    foreach($lista_categorias as $key_categoria){
                        if(!empty($key_categoria)){
                            $referencia_categoria = $key_categoria['id'];
                            
                ?>

                      <option value="<?php echo $key_categoria['id']; ?>"><?php echo $key_categoria['categoria']; ?></option>

                <?php }} ?>
            </select>
          </div>

          <div class="form-floating mb-3">
            <select readonly class="form-control" name="subcategoria" id="subCategoriaNova">
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


          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCategoria()" type="button">Salvar</button>
          
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

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modaledCor">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Editar Cor</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modaledCor" data-toggle="modal" data-target="#modaledCor" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" id="formEditarCor" action="script" enctype="multipart/form-data" method="post">

          <div class="form-floating mb-3">
            <input type="file" name="arquivos[]" class="form-control rounded-4" id="arquivos_cor" maxlength="6" multiple>
            <label for="arquivos_cor">Fotos:</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-4" id="nova_cor" name="nome_cor" placeholder="">
            <label for="nova_cor">Nome:</label>
          </div>
          <input type="hidden" name="id" id="idEdCor" value="">
          <input type="hidden" name="funcao" id="funcao" value="editar_cor">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="salvarCor()" type="button">Adicionar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>


<!-- ____________________________________________________________________________________________________________________________________________________________________________________ -->



<!-- Modal confirmação -->

<div class="modal modal-signin fade" tabindex="-1" role="dialog" id="modalConfirmar">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-5 shadow">
      <div class="modal-header p-5 pb-4 border-bottom-0">
        <!-- <h5 class="modal-title">Modal title</h5> -->
        <h2 class="fw-bold mb-0">Tem certeza?</h2>
        <button type="button" class="btn-close bi-x-square" data-bs-dismiss="#modalConfirmar" data-toggle="modal" data-target="#modalConfirmar" aria-label="Close"></button>
      </div>

      <div class="modal-body p-5 pt-0">
        <form class="" id="formEditarCor" action="script" enctype="multipart/form-data" method="post">
          <input type="hidden" name="dadosAjax" id="dadosAjax" value="">
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn-primary" onclick="sendAjax()" type="button">Confirmar</button>
          <button class="w-100 mb-2 btn btn-lg rounded-4 btn" data-bs-dismiss="#modalConfirmar" data-toggle="modal" data-target="#modalConfirmar" aria-label="Close" type="button">Cancelar</button>
          
        </form>
      </div>
    </div>
  </div>
</div>






<!-- _____________________________________________________________________________________________________________________________________________________________________________________ -->




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
                                    <textarea style="height: 6rem;" readonly maxlength="64000" rows="6" name="descricao" id="descricao" class="form-control" ><?php echo $produto_modificar['descricao']; ?></textarea>
                                    <span class="form-bar"></span>
                                </div>
                                <button class="btn btn-primary" type="button" onclick="editarDescricao()" data-toggle="modal" data-target="#modalDesc">
                                    <span class="bi-pencil-square"></span>  
                                    <br>
                                    <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                        Editar Descrição 
                                    </label>
                                </button> 

                                <h6>Categoria e subcategoria:</h6>
                                <div class="row">
                                    <div style="margin: 0 2%;" class="form-group col form-primary">

                                        <select readonly class="form-control" name="categoria" id="categoria">
                                            <?php
                                                $categoria_id = $produto_modificar['categoria'];
                                                $consulta_categorias = $conn->query("SELECT * FROM categorias WHERE `id` = '$categoria_id'");
                                                $lista_categorias = [];
                                                while($lista_categorias[] = $consulta_categorias->fetch_assoc());

                                                foreach($lista_categorias as $key_categoria){
                                                    if(!empty($key_categoria)){
                                                        $referencia_categoria = $key_categoria['id'];
                                                        
                                            ?>
                                                    
                                                     
                                                    <option value="<?php echo $key_categoria['id']; ?>"><?php echo $key_categoria['categoria']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <div style="margin: 0 2%;" class="form-group col form-primary">
                                    
                                    
                                        <select readonly class="form-control" name="subcategoria" id="subcategoria_select">
                                            <?php
                                                $subcategoria_id = $produto_modificar['subcategoria'];
                                                $lista_subcategorias = [];
                                                $consulta_subcategoria = $conn->query("SELECT * FROM `subcategorias` WHERE `id` = '$subcategoria_id'");
                                                while($lista_subcategorias[] = $consulta_subcategoria->fetch_assoc());

                                                foreach($lista_subcategorias as $subkey){
                                                    if(!empty($subkey)){
                                            ?>
                                                    <option value="<?php echo $subkey['id']; ?>"><?php echo $subkey['subcategoria']; ?></option>
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary" type="button" onclick="editarCategoria()" data-toggle="modal" data-target="#modalCat">
                                        <span class="bi-pencil-square"></span>  
                                        <br>
                                        <label style="padding: 0; margin: 0;" for="#btnExcluir">
                                            Editar categoria 
                                        </label>
                                    </button> 
                                </div>



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
                                        // echo "<script> console.log(" . print_r($listar_cores_query, True) . ") </script>";
                                        print_r($listar_cores_query);
                                        if(!empty($listar_cores_query)){
                                          while($lista_cores[] = $listar_cores_query->fetch_assoc());

                                        }

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
                                                                <img style="height:100px; margin-left: 6px;" src="<?php echo $key['fotos'] . '/' . $foto; ?>" alt="">
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
                                                                            <button id="btnExcluir" class="btn btn-danger" style="border-radius: 5px; margin: 1%; padding:0" data-toggle="modal" data-target="#modalConfirmar" type="button" onclick="excluirTamanho(<?php echo $key_tamanho['id']; ?>)"><span style="text-color: red" class="bi-x-square"></span><br><label style="padding: 0; margin: 0;" for="#btnExcluir">Excluir</label></button>
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
                                                                                    <button type="button" class="btn btn-danger form-static-label" id="tcor1btn10" data-toggle="modal" data-target="#modalConfirmar" onclick="excluirCor(<?php echo $key['id']; ?>)">Excluir Cor</button>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <button type="button" class="btn btn-success form-static-label" id="tcor1btn10" onclick="editarCor('<?php echo $key['id']; ?>')" data-toggle="modal" data-target="#modaledCor">Editar Cor</button>
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
                                        <button style="font-weight: bold" onclick="excluirProduto(<?php echo $_GET['pd'] ?>)" class="btn-lg col-md-4 container btn-danger" type="button" data-toggle="modal" data-target="#modalConfirmar">EXCLUIR PRODUTO</button>
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
<script src="assets/js/script_dashboard.js"></script>
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
