<?php include 'head.php' ?>

<?php
$id_ct = $_GET['ct'];
$ct_b = $conn->query("SELECT * FROM categorias WHERE id = '$id_ct' LIMIT 1");
$ct_b = $ct_b->fetch_assoc();
?>

<title>"<?php echo $ct_b['subcategoria']; ?>" - Divas Pink</title>

<?php include 'header.php' ;


$row = $conn->query("SELECT * FROM produtos WHERE categoria = '$id_ct'");
$result = [];

?>


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
                        <h1 class="productPrice"><?php echo 'R$' . $key['valor']; ?></h1>
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