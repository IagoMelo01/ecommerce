<?php 
include_once './setup/conn.php';
session_start();

if($_SESSION['token'] != $_GET['token'] || empty($_GET['token'])){
    echo '<script>alert("Credenciais Inválidas")  ;window.location.href = "./";</script>';
}

if(!isset($_SESSION['logged']) && $_SESSION['logged'] != 'ok'){
    echo '<script>alert("Faça o login para continuar")  ;window.location.href = "./";</script>';
}

if(isset($_POST['numero'])){
    $_SESSION['endereco'] = $_POST;
    echo '<script> window.location.href = "./MP/"; </script>';
}

function get_endereco($cep){
    // formatar o cep removendo caracteres nao numericos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";
  
    $xml = simplexml_load_file($url);
    return $xml;
}

/*
include 'head.php';
echo '<title>Finalizar Pedido - Divas Pink</title><meta name="robots" content="noindex"></head>';



if(!empty($_SESSION['carrinho']) && !empty($_SESSION['frete'])) {
    echo '<script>window.location.href = "./MP/";</script>';
}*/


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style2.css" media="screen and (min-width: 480px) and (max-width: 768px)">
    <link rel="stylesheet" type="text/css" href="./css/style1.css" media="screen and (max-width: 480px)">
    <link rel="stylesheet" href="css/style.css" media="screen and (min-width: 769px)">
    <meta name="robots" content="noindex">
    <title>Finalizar Pedido - Divas Pink</title>
</head>
<body>
    <form action="" method="post">
        <div class="containercfdm">
            <div class="product-item">

            <?php 

            /*      CRIA A LISTA NO CARRINHO    */

                $controle = 0;
                $val = [];
                foreach($_SESSION['carrinho'] as $key){
                    
                    $produto_carrinho = $key['produto'];
                    $cor_carrinho = $key['cor'];
                    $tamanho_carrinho = $key['tamanho'];

                    $carrinho = $conn->query("SELECT * FROM produtos WHERE id = '$produto_carrinho' LIMIT 1");
                    $carrinho = $carrinho->fetch_array(MYSQLI_ASSOC); 

                    $preco = number_format($key['qtd'] * str_replace(',', '.', $carrinho['valor']), 2, ',', '.');
                    array_push($val, $preco);

                    $adicionar_cor = $conn->query("SELECT * FROM cores WHERE id = '$cor_carrinho' LIMIT 1");
                    $adicionar_cor = $adicionar_cor->fetch_array(MYSQLI_ASSOC); 

                    $adicionar_tamanho = $conn->query("SELECT * FROM tamanhos WHERE id = '$tamanho_carrinho' LIMIT 1");
                    $adicionar_tamanho = $adicionar_tamanho->fetch_array(MYSQLI_ASSOC); ?>


                <div class="product-details">
                    <img src="<?php echo $carrinho['capa'] ;?>">
                    <div class="product-details__info">
                        <div class="product-details__info_name_icon">
                            <div>
                                <h3 class="name"><?php echo $carrinho['titulo'] ;?></h3>
                            </div>
                            <div class="remove-icon">
                                <span onclick="del('<?php echo $key['produto'] ;?>', '<?php echo $key['cor'] ;?>', '<?php echo $key['tamanho'] ;?>')" class="bi-trash"></span>
                            </div>
                        </div>
                        <div class="custom">
                            <p class="custom__text"><strong>Tamanho:</strong>&nbsp;<?php echo $adicionar_tamanho['tamanho'] ;?></p>
                            <p class="custom__text"><strong>Cor:</strong>&nbsp;<?php echo $adicionar_cor['cor'] ;?></p>
                            <p class="custom__text"><strong>Quantidade:</strong>&nbsp;<?php echo $key['qtd'] ;?></p>
                        </div>
                    </div>
                </div>
                
                <?php 
            
                    $controle++;
                }

            ?>

            </div>
            <?php $endereco = get_endereco($_SESSION['frete']['cepc']); ?>
            <div style="margin-top: 20px;">Estado:</div>
            <input required value="<?php echo $endereco->uf; ?>" class="formField" type="text" name="Estado">
            <div>Cidade:</div>
            <input required value="<?php echo $endereco->localidade; ?>" class="formField" type="text" name="Cidade">
            <div>Bairro:</div>
            <input required value="<?php echo $endereco->bairro; ?>" class="formField" type="text" name="Bairro">
            <div>Rua/Logradouro:</div>
            <input required value="<?php echo $endereco->logradouro; ?>" class="formField" type="text" name="Rua">
            <div>Número:</div>
            <input required class="formField" type="text" name="numero">
            <input class="formField btn" type="submit" value="Continuar">
        </div>      
    </form>

    <style>
                .containercfdm{
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .containercfdm{
            display: flex;
            flex-direction: column;
        }
        .formField{
            margin-top: 5px;
        }
        @media (max-width: 425px){
            .formField{
                width: 70%;
            }
        }
        @media (min-width: 426px){
            .formField{
                width: 40vw;
            }
        }
        @media (min-width: 768px){
            .formField{
                width: 25vw;
                height: 40px;
                padding: 0px;
            }
            .product-item{
                width: 60%;
            }
        }
        .btn{
            background-color: #da0057;
            border: solid #da0057;
            color: white;
            margin: 6px;
        }
    </style>
</body>
</html>