<pre>
<?php
print_r($_FILES);
echo '<br><br>';
$path ="./www/uploads/";
$diretorio = dir($path);
echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
    while($arquivo = $diretorio -> read()){
        echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
    }
$diretorio -> close();

include_once '../setup/conn.php';

if(isset($_POST['nom'])){
    $produto = $_POST['produto'];
    $file = $_FILES['arq']['name'];
    $dir = $path . $produto . '/';
    
    
    if (mkdir($dir, 0755)) {
        $control = 0;
        
        foreach($_FILES['arq']['name'] as $key){
            $uploadfile = $dir  . basename($_FILES['arq']['name'][$control]);
            if (move_uploaded_file($_FILES['arq']['tmp_name'][$control], $uploadfile)) {
                echo "Arquivo válido e enviado com sucesso.\n";
            } else {
                echo "Falha no upload de $file\n";
            } 
            $control++;
            
        }
    } else {
        echo "Falha no upload dos arquivos\n";
    }
}


?>
</pre>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Imbue:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="assets/libs/jQuery/jquery-3.6.0.min.js"></script>
    <script src="assets/js/script.js"></script>
    <script src="assets/libs/jQuery/jquery.mask.js"></script>
    <script src="assets/libs/bootstrap/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <form action="" enctype="multipart/form-data" method="post">
    <div class="row">
            <input class="col-6" type="text" name="produto" id="prod">
            <input maxlength="15" class="col-4 pr" type="text" name="preco" id="">
    </div>

    <b>dimensões</b>
    <div class="container">
        <input type="text" name="altura" id="">
        <input type="text" name="largura" id="">
        <input type="text" name="comprimento" id="">
    </div>

    
    <input type="text" name="peso" id="">
    <input type="file" name="capa" id="">
    
    <div class="col-lg-">
        <input type="file" multiple accept="image/*" name="arq[]" id="aq" >
    </div>
    <div class="col-lg-">
        <input type="text" name="nom" id="n">
    </div>
    <div class="col-lg-">
        <input type="submit" value="send">
    </div>

    <input type="text" name="" id="" class="cc">
    </form>
</div>
    
</body>
</html>


<img src="<?php echo 'ftp/' . $remote_file; ?>" alt="">