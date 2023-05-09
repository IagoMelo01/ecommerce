

<?php 
include '../conn.php'; 

session_start();

if(isset($_SESSION['logged']) && $_SESSION['logged'] == 'ok'){
    $dados = $_SESSION['dados'];
} else {
    echo '<script>alert("Faça o login para continuar")  ;window.location.href = "../";</script>';
}

?>



<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta name="robots" content="noindex">
        <meta charset="utf8">
        <title>Usuário - Divas Pink</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/style1.css" media="screen and (min-width: 480px) and (max-width: 768px)">
        <link rel="stylesheet" type="text/css" href="../css/style1.css" media="screen and (max-width: 480px)">
        <link rel="stylesheet" href="../css/style.css" media="screen and (min-width: 769px)">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Imbue:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" type="text/css" href="./styles/index.css">
        <link rel="stylesheet" type="text/css" href="./styles/dados.css">
        <link rel="stylesheet" type="text/css" href="./styles/endereco.css">
        <script src="../js/jquery-3.6.0.min.js"></script>
        <script src="../js/script.js"></script>
	    <script src="../js/jquery.mask.js"></script>
        <!-- <script src="../js/bootstrap.min.js"></script> -->
    

</head>

<body>
    
    <div class="pc">
        <header class="header pc backcolor0">
            <div class="headerContainer pc">
                <a style="text-decoration: none;" href="../">
                    <img class="title" src="../assets/logo_divas1300.png" alt="logo">
                </a>

                <form class="searchForm" action="search.php" method="GET">
                    <input value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" class="search" type="text" name="search" placeholder=" Pesquisar...">
                    <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
                </form>

                <nav class="nav">
                    <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'ok') { ?> 
                        <button id="Btn_Conta" onclick="perfil()" class="menu">
                            <h3>Minha conta</h3>
                        </button>
                    <?php } else { ?>
                        <button id="Btn_Login" class="menu">
                            <h3>Entre</h3>
                        </button>
                    <?php } ?>
                    <a class="menu" href="cart.php">
                        <h3>Carrinho</h3>
                    </a>
                </nav>
            </div>
        </header>
    </div>
    

    <header id="header_mobile" class="header mobile backcolor0">
        <button onclick="abrirModal()" class="side_menu_btn"><img src="../assets/btn_menu.png" alt=""></button>
        <div class="headerContainer">
            <a style="text-decoration: none;" href="./">
                <img class="title" src="../assets/logo_divas1300.png" alt="logo">
            </a>

            <form class="searchForm" action="search.php" method="GET">
                <input value="<?php if(isset($_GET['search'])) { echo $_GET['search']; } ?>" class="search" type="text" name="search" placeholder=" Pesquisar...">
                <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
            </form>

            <nav class="nav">
                <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'ok') { ?>
                    <button id="Btn_Conta" onclick="perfil()" class="menu">
                        <h3>Minha Conta</h3>
                    </button>
                <?php } else { ?>
                    <button id="Btn_Login" class="menu">
                        <h3>Login</h3>
                    </button>
                <?php } ?>
                <a class="menu" href="cart.php">
                    <h3>Carrinho</h3>
                </a>
            </nav>
        </div>

    </header>

    <form class="searchFormMobile" action="search.php" method="GET">
        <input class="search" type="text" name="search" placeholder=" Pesquisar...">
        <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
    </form>

    <?php include '../conn.php';
        $hconsulta_categorias = $conn->query("SELECT * FROM categorias");
        $hlista_categorias = [];
        while($hlista_categorias[] = $hconsulta_categorias->fetch_assoc());
    
    ?>
    <div onclick="fecharModal()" id="side_menu_modal" class="side_menu_modal mobile" >
        <div class="side_menu">
            <div class="side_menu_link">
                <a class="no_decoration" href="../">Início</a>
            </div>
            <div class="side_menu_link">
                <a class="no_decoration" href="./cart">Carrinho</a>
            </div>
            <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == 'ok') { ?>
                <div class="side_menu_link">
                    <button id="Btn_Conta" onclick="perfil()" class="no_decoration">Minha Conta</button>
                </div>
            <?php } else { ?>
                <div class="side_menu_link">
                    <button onclick="modalLogin()" class="no_decoration" >Login</button>
                </div>
            <?php } ?>
            
            <div class="side_menu_link">
                <ul>
                    <?php foreach($hlista_categorias as $hkey){ if($hkey){ ?>
                        <li><a href="categorias?ct=<?php echo $hkey['id'] ?>" class="no_decoration"><?php echo $hkey['categoria'] ?></a></li>
                    <?php }} ?>
                </ul>
            </div>
        </div>
    </div>



    <!-- The Modal -->
    <div id="Modal_Login" class="modal">

        <!-- Modal content -->
        <div onclick="none()" class="modal-content">
            <span onclick="closeLoginCadastro()" id="close" class="close">&times;</span>
            <div class="FormContent">
                <h1>LOGIN</h1>
                <form class="formLogin" action="" method="post">
                    <div style="margin-top: 0;">
                        <b>Email:</b>
                    </div>
                    <input required class="formField" type="text" name="email" id="email" <?php if (isset($controle)) {
                                                                                                echo 'value="' . $email . '"';
                                                                                            } ?>>
                    <div>
                        <b>Senha:</b>
                    </div>
                    <input required minlength="8" class="formField" type="password" name="senha" id="senha">
                    <div>
                        <input class="submit" type="submit" value="ENTRAR">
                    </div>
                    <input type="hidden" name="login" value="1">
                </form>
            </div>

            <div class="Cadastrar-EsqueciSenha">
                <button onclick="modalCadastro()" id="Btn_Cadastro" class="cadastrar">Cadastrar</button> <span>|</span> <a href="" class="EsqueciMinhaSenha">Esqueci minha senha</a>
            </div>
        </div>
    </div>

    <div id="Modal_Cadastro" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span onclick="closeLoginCadastro()" id="close" class="close">&times;</span>
            <div class="FormContent">
                <h1>REGISTER</h1>
                <form class="formLogin" action="" method="post">
                    <div style="margin-top: 0;">
                        <b>Email:</b>
                    </div>

                    <input required class="formField" type="text" name="email" id="email" <?php if (isset($controle)) {
                                                                                                echo 'value="' . $email . '"';
                                                                                            } ?>>


                    <div>
                        <b>Senha:</b>
                    </div>

                    <input required minlength="8" class="formField" type="password" name="senha" id="senha">

                    <div>
                        <b>Confirmar senha:</b>
                    </div>

                    <input required minlength="8" class="formField" type="password" name="c_senha" id="c_senha">


                    <div>
                        <b>Celular:</b>
                    </div>

                    <input required minlength="14" maxlength="15" class="formField cel" type="text" name="cel" id="cel_cad">

                    <div>
                        <b>Cpf:</b>
                    </div>

                    <input required class="formField cpf" type="text" name="cpf" id="cpf_cad">


                    <div>
                        <b>Nome Completo:</b>
                    </div>

                    <input required class="formField" type="text" name="nome" id="nome">

                    <div>
                        <b>Data de nascimento:</b>
                    </div>

                    <input required class="formField data" minlenght="10" type="text" name="nascimento" id="nascimento">

                    <div>
                        <b>Estado:</b>
                    </div>

                    <input required class="formField" type="text" name="estado">


                    <div>
                        <b>Cidade:</b>
                    </div>

                    <input required class="formField" type="text" name="cidade">

                    <div>
                        <b>Bairro:</b>
                    </div>

                    <input required class="formField" type="text" name="bairro">

                    <div>
                        <b>Rua:</b>
                    </div>

                    <input required class="formField" type="text" name="rua">

                    <div>
                        <b>Numero:</b>
                    </div>

                    <input required class="formField" type="nmber" name="numero">

                    <input type="hidden" name="cadastro">

                    <div>
                        <input class="submit" type="submit" value="CADASTRAR">
                    </div>
                </form>
            </div>

            <div class="fazer-login">
                <span>Já possui uma conta? </span> <button onclick="modalLogin()" class="cadastrar" id="Btn_Login1">Fazer Login</button>
            </div>
        </div>

    </div>