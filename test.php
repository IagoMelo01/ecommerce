 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

// function get_endereco($cep){


//   // formatar o cep removendo caracteres nao numericos
//   $cep = preg_replace("/[^0-9]/", "", $cep);
//   $url = "http://viacep.com.br/ws/$cep/xml/";

//   $xml = simplexml_load_file($url);
//   return $xml;
// }

// ?>
// <meta charset="utf-8">
// <h1>Pesquisar Endereço</h1>
// <form action="" method="post">
//   <input type="text" name="cep">
//   <button type="submit">Pesquisar Endereço</button>
// </form>
// <?php // if($_POST['cep']){ ?>
// <h2>Resultado da Pesquisa</h2>
// <p>
//   <?php // $endereco = get_endereco("38603300"); ?>
<!-- //   <b>CEP: </b> <?php  // echo $endereco->cep; ?><br> -->
<!-- //   <b>Logradouro: </b> <?php // echo $endereco->logradouro; ?><br> -->
<!-- //   <b>Bairro: </b> <?php // echo $endereco->bairro; ?><br> -->
<!-- //   <b>Localidade: </b> <?php // echo $endereco->localidade; ?><br> -->
<!-- //   <b>UF: </b> <?php // echo $endereco->uf; ?><br> -->
// </p>
// <?php // } ?>

<?php
// Create a blank image and add some text
$im = imagecreatetruecolor(120, 20);
$text_color = imagecolorallocate($im, 233, 14, 91);
imagestring($im, 1, 5, 5,  'A Simple Text String', $text_color);

// Save the image as 'simpletext.jpg'
imagejpeg($im, 'simpletext.jpg');

// Free up memory
imagedestroy($im);
?>


<img src="" alt="">
<form action="" enctype="" method="post"></form>

</body>
</html> 