


<?php include 'header.php'; ?>

<?php 

$dados = $_SESSION['dados'];

if(isset($_POST['controle'])){
    if($_POST['senha'] == $_POST['cSenha']){
        $nasc = $_POST['nasc'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $id = $dados['id'];
        $conn->query("UPDATE `usuarios` SET `nome`='$nome',`email`='$email',`senha`='$senha',`telefone`='$tel',`cpf`='$cpf',`nascimento`='$nasc' WHERE id = '$id'");
        $res = $conn->query("SELECT * FROM `usuarios` WHERE id = '$id'");
        $res = $res->fetch_array(MYSQLI_ASSOC);
        $_SESSION['dados'] = $res;
        echo '<b>Dados alterados com sucesso</b><br><br>';
    } else {
        echo '<div style="color: red;"><b>Erro: Senhas diferentes!</b></div><br><br>';
    }
    
}

?>

        <Form class="myorders" method="POST">
            <div class="container-endereco">
                <h1 class="title">Seus Dados</h1>
                <div class="field">
                    <span>Nome completo</span>
                    <input value="<?php echo $dados['nome'] ?>" name="nome" type="text">
                </div>
                <div class="field">
                    <span>Data nascimento</span><br>
                    <input value="<?php echo $dados['nascimento'] ?>" name="nasc" type="date">
                </div>
                <div class="field">
                    <span>CPF</span>
                    <input value="<?php echo $dados['cpf'] ?>" name="cpf" class="cpf" type="text" minlength="14" maxlength="11">
                </div>
                <div class="field">
                    <span>Telefone</span>
                    <input value="<?php echo $dados['telefone'] ?>" name="tel" class="cel" type="text">
                </div>
                <div class="field">
                    <span>E-mail</span>
                    <input value="<?php echo $dados['email'] ?>" name="email" type="email">
                </div>
                <div class="field">
                    <span>Senha</span>
                    <input value="<?php echo $dados['senha'] ?>" name="senha" type="password">
                </div>
                <div class="field">
                    <span>Confirmar senha:</span>
                    <input value="<?php echo $dados['senha'] ?>" name="cSenha" type="password">
                </div>
                <input type="hidden" name="controle">
                <div class="botao">
                    <input type="submit" value="SALVAR INFORMAÇÕES">
                </div>
        </Form>
    </div>
    </div>
</body>

</html>