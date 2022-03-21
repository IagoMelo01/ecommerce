<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/dados.css">
    <title>Document</title>
</head>

<body>
    <?php include "header.php"; ?>

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

        <Form class="myorders" action="./src/database/update_dados.php" method="post">
            <div class="container-endereco">
                <h1 class="title">Seus Dados</h1>
                <div class="field">
                    <span>Nome completo</span>
                    <input class="input-dados" type="text" name="nome">
                </div>
                <div class="field">
                    <span>Data nascimento</span><br>
                    <input class="input-dados" type="date" name="data">
                </div>
                <div class="field">
                    <span>CPF</span> 
                    <input class="input-dados" type="number" name="cpf" minlength="11" maxlength="11">
                </div>
                <div class="field">
                    <span>Telefone</span>
                    <input class="input-dados" type="number" name="telefone">
                </div>
                <div class="field">
                    <span>E-mail</span>
                    <input class="input-dados" type="email" name="email">
                </div>
                <div class="field">
                    <span>Senha</span>
                    <input class="input-dados" type="password" name="senha">
                </div>


                <div class="botao">
                    <input class="input-dados" type="submit" value="SALVAR INFORMAÇÕES" name="botao">
                </div>
            </div>
        </Form>
    </div>
    </div>
</body>

</html>