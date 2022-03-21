<?php 



include './head.php';


if(!isset($_GET['pd'])){
    echo '<script>window.location.href = "./";alert("Produto Indisponível");</script>';
}

$id_prod = $_GET['pd'];


$respd = $conn->query("SELECT * FROM produtos WHERE id = '$id_prod'");
$produto = $respd->fetch_array(MYSQLI_ASSOC);

$rescr = $conn->query("SELECT * FROM cores WHERE referencia = '$id_prod'") ;
while($key = $rescr->fetch_array(MYSQLI_ASSOC)){
    $cores[] = $key;
}


if(isset($_GET['ccc'])){
    $ccc = $_GET['ccc'];
} else {
    $ccc = 0;
}

$id_cor = $cores[$ccc]['id'];

$restm = $conn->query("SELECT * FROM tamanhos WHERE referencia = '$id_cor'") ;
while($key = $restm->fetch_array(MYSQLI_ASSOC)){
    $tamanhos[] = $key;
}



//echo '<div><pre>';
$path = str_replace('../' , '', $cores[$ccc]['fotos']);
//echo $path;
$diretorio = dir($path);
$arquivos = [];
//echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
    while($arquivo = $diretorio -> read()){
        $arquivos[]= "$arquivo";
    }
$diretorio -> close();

//print_r($arquivos);

//echo '</pre></div>';


echo "<title>". $produto['titulo'] ." - Divas Pink</title>";

include "header.php";

?>


<div><br><br></div>


<?php $contFotos = 2; $tFotos = count($arquivos); ?>
        <div class="content">
            <div class="productView">
                <img class="productViewMainImage" id="productViewMainImage" src="<?php echo $path . '/' . $arquivos[2] ;?>" alt="">
                <div class="otherImage">

                    <?php while($contFotos < $tFotos){ ?>
                    <div class="altImageCard" onclick="fotos('<?php echo $path . '/' . $arquivos[$contFotos] ;?>')">
                        <img class="altImage" src="<?php echo  $path . '/' . $arquivos[$contFotos] ;?>" alt="">
                    </div>
                    <?php $contFotos++; } ?>
                </div>
            </div>


            <div class="productInfo">
                
                <div><h2 class="productViewTitle"><?php echo $produto['titulo'] ;?></h2></div>

                <br><br>


                <div class="h4 color1"><div style="font-size: 4vh; display: inline;">R$</div> <?php echo $produto['valor'] ;?></div>


                <div class="productColors">
                    <div>cor: <div class="productColorOption"> <?php echo $cores[$ccc]['cor'] ; ?></div></div>
                </div>

                <!-- <div class="imageColors">
                    <img class="imageColorOption" src="https://imgcentauro-a.akamaihd.net/900x900/95502202/porta-acessorios-shoesleeve-mizuno-4133248-img.jpg" alt="">
                </div> -->

                <?php $controleccc = 0; foreach($cores as $key){ ?>

                
                    <div class="sizes">
                        <a href="<?php echo 'product?pd='. $id_prod .'&ccc=' . $controleccc ; ?>"><button <?php if(strtolower($key['cor']) == strtolower($cores[$ccc]['cor'])){ echo 'style="background-color: gray;"'; } ?> id="btn" class="btnCor"><?php echo $key['cor'] ;?></button></a>
                    </div>

                <?php $controleccc++; } ?>
                <div style="font-weight: bold; text-transform: uppercase; margin-top: 10%;">tamanhos:</div>

                <div  style="display:flex;">
                <?php $controletm = 0; foreach($tamanhos as $key){ ?>

                
                    <div class="sizes">
                        <button id="<?php echo 'size' . $controletm ;?>" onclick="size(<?php echo $controletm. ',' . $key['id'] ;?>)" class="btnSize"><?php echo $key['tamanho'] ;?></button>
                    </div>

                <?php $controletm++; } ?>
                </div>
                <form id="formTamanho" action="cart" method="post">
                    <input type="hidden" name="produto" value="<?php echo $_GET['pd'] ;?>">
                    <input id="tamEsc" type="hidden" value="false" name="tamanho">
                    <input type="hidden" name="cor" value="<?php echo $cores[$ccc]['id'] ;?>">
                    <input type="hidden" name="qtd" value="1">
                </form>

                <div onclick="buy()" class="btnBuy" >adicionar ao carrinho</div>
                
                <div href="cart.html">
                    <!--
                    <div class="btnCart"> 
                        adicionar ao carrinho
                    </div>-->
                </div>
                    

            </div>

        </div>

        
        
        <div class="descricao_produto">
            <h1>DESCRIÇÃO</h1>
            <p><?php echo $produto['descricao'] ;?></p>
        </div>
        
        <div class="descricao_produto" style="margin-bottom: 2%">
            <h1>PRODUTOS SIMILARES</h1>
        </div>

        <div class="card1" style="padding: 0">
            <div class="grid-container">

                <?php
                    $refpd = $produto['subcategoria'];
                    $row = $conn->query("SELECT * FROM `produtos` WHERE subcategoria = '$refpd' AND id != '$id_prod' LIMIT 4");
                    $result = [];
                    while ($key = $row->fetch_assoc()) {
                ?>
                    <div class="grid-item">
                        <a class="nounderline" href="<?php echo 'product.php?pd=' . $key['id']; ?>">
                            <div class="product">
                                <div class="productImg">
                                    <img src="<?php echo $key['capa']; ?>" alt="<?php echo $key['titulo']; ?>" class="productImage">
                                </div>
                                <h2 class="productTitle"><?php echo $key['titulo']; ?></h2>
                                <h1 class="productPrice"><?php echo 'R$ ' . $key['valor']; ?></h1>
                                <a style="text-decoration: none;" href="<?php echo 'product.php?pd=' . $key['id']; ?>">
                                    <div class="btnComprar">
                                        <p>DETALHES</p>
                                    </div>
                                </a>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>   



        
    
        
<?php include 'footer.php'; ?>