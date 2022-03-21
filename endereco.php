<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/endereco.css">
    <title>Document</title>
</head>

<body>
    <?php include "header.php";?>

    <style type="text/css">
        @media (max-width: 768px) {
            .searchFormMobile {
                display: none;
                z-index: 1000;
            }
        }
    </style>
    
    <div class="container">
        <div class="side-menu pc">
            <a href="pedido.php">
                <div class="item">
                    <div>
                        <span2>Pedidos</span2>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="dados.php">
                <div class="item">
                    <div>
                        <span2>Seus dados</span2>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="endereco.php">
                <div class="item">
                    <div>
                        <span2>Endereço</span2>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="">
                <div class="item">
                    <div>
                        <span2>Sair</span2>
                    </div>
                </div>
            </a>
        </div>

        <Form class="myorders">

            <div class="container-endereco">
                <h1 class="title">Endereço</h1>
                <div class="field">
                    <span>Nome do Endereço</span>
                    <input class="input-endereco" type="">
                </div>
                <div class="field">
                    <span>CEP</span><br>
                    <input class="input-endereco" type="text">
                </div>
                <div class="field">
                    <span>Nome destinatário</span>
                    <input class="input-endereco" type="text">
                </div>
                <div class="field">
                    <span>Número</span>
                    <input class="input-endereco" type="">
                </div>
                <div class="field">
                    <span>Complemento</span>
                    <input class="input-endereco" type="text" placeholder="Complemento (opcional)">
                </div>
                <div class="field">
                    <span>Bairro</span>
                    <input class="input-endereco" type="text">
                </div>
                <div class="field">
                    <span>Estado</span>
                    <input class="input-endereco" type="text" placeholder="Minas Gerais">
                </div>
                <div class="field">
                    <span>Cidade</span>
                    <input class="input-endereco" type="text">
                </div>
                <div class="field">
                    <span>Ponto de referência</span>
                    <input class="input-endereco" type="text" placeholder="Ponto de referência (opcional)">
                </div>
                <div class="botao">
                    <input class="input-endereco" type="submit" value="SALVAR">
                </div>
            </div>
        </Form>
    </div>
</body>

</html>