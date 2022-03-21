<?php

include 'conn.php';

$row = $conn->query("SELECT * FROM `produtos` WHERE 1");
$result = [];
//print_r( $row->fetch_array(MYSQLI_ASSOC));
// while( $row->fetch_array(MYSQLI_ASSOC)){
//array_push($result, $row->fetch_array(MYSQLI_ASSOC));
// }
?>


<?php

include './head.php';

echo "<title>Divas Pink - Início</title>";

include './header.php'; 

?>
 
<div class="banner">

    

    <div class="carousel">
        <div><img class="bannerImg" src="./assets/Home1.jpeg" alt="" /></div>
        <div><img class="bannerImg" src="./assets/Home2.jpeg" alt="" /></div>
        <div><img class="bannerImg" src="./assets/Home3.jpeg" alt=""/></div>
    </div>

    
    <script src="./js/carousel.js"></script>
        

    
</div>


<div class="backCat">
    <div class="category">
            <ul class="catMenu">
                <?php
                    $sconsulta_subcategorias = $conn->query("SELECT * FROM subcategorias");
                    $slista_subcategorias = [];
                    while($slista_subcategorias[] = $sconsulta_subcategorias->fetch_assoc());

                    foreach($slista_subcategorias as $skey){ if($skey){
                
                ?>
                    <li class="catMenuItem">
                        <a class="catMenuCategory" href="subcategorias?subc=<?php echo $skey['id']; ?>"><?php echo $skey['subcategoria']; ?></a>
                        <!-- <ul class="subMenu">
                            <li><a class="subMenuItem" href="#">relógios</a></li>
                            <li><a class="subMenuItem" href="#">pulseiras</a></li>
                            <li><a class="subMenuItem" href="#">colares</a></li>
                            <li><a class="subMenuItem" href="#">brincos</a></li>
                            <li><a class="subMenuItem" href="#">anéis</a></li>
                            <li><a class="subMenuItem" href="#">braceletes</a></li>
                        </ul> -->
                    </li>
                <?php }} ?>
                
            </ul>

    </div>
</div>


<div class="card1">
    <div class="grid-container">

        <?php
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