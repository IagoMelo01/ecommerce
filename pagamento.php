<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="./css/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
</head>

<body>
    <?php
    include "header.php";
    ?>

    <div class="container-payment">
        <form id="Form1" name="Form1" method="post" action="controllers/controllerPedido.php">
            <input type="hidden" id="TokenCard" name="TokenCard">
            <input type="hidden" id="HashCard" name="HashCard">
            <input type="hidden" id="idProduto" name="idProduto" value="1">
            <input type="hidden" id="Amount" name="Amount" value="100">

            <div>
                <strong>Dados do comprador:</strong><br><br>

                <div>
                    <div>
                        Nome: <br>
                        <input required type="text" class="formField" id="NomeComprador" name="NomeComprador">
                    </div>


                    <div>
                        CPF: <br>
                        <input required type="text" class="formField" id="CPFComprador" name="CPFComprador" maxlength="11">
                    </div>

                </div>


                <div>
                    <div>
                        DDD: <br>
                        <input required type="text" class="formField" id="DDDComprador" name="DDDComprador" maxlength="2">
                    </div>

                    <div>
                        Telefone: <br>
                        <input required type="text" class="formField" id="TelefoneComprador" name="TelefoneComprador" maxlength="9">
                    </div>

                    <div>
                        Email: <br>
                        <input required type="text" class="formField" id="EmailComprador" name="EmailComprador">
                    </div>
                </div>

            </div>

            <div>
                <hr>
            </div>

            <div>
                <strong>Endereço de cobrança:</strong><br><br>

                <div>
                    <div>
                        CEP: <br>
                        <input required type="text" class="formField" id="CEP" name="CEP" maxlength="8">

                    </div>

                    <div>
                        Rua: <br>
                        <input required type="text" class="formField" id="Endereco" name="Endereco">

                    </div>

                    <div>
                        Número: <br>
                        <input required type="text" class="formField" id="Numero" name="Numero">

                    </div>

                    <div>
                        Complemento: <br>
                        <input required type="text" class="formField" id="Complemento" name="Complemento">
                    </div>
                </div>

                <div>
                    <div>
                        Bairro: <br>
                        <input required type="text" class="formField" id="Bairro" name="Bairro">
                    </div>

                    <div>
                        Cidade: <br>
                        <input required type="text" class="formField" id="Cidade" name="Cidade">
                    </div>

                    <div>
                        UF: <br>
                        <select name="UF" id="UF" required>
                            <option value="">Selecione</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div>
            </div>

            <div>
                <hr>
            </div>

            <div>
                <strong>Dados do Cartão:</strong><br><br>

                <div>
                    <div>
                        Número do Cartão: <br>
                        <div>
                            <input required type="text" class="formField" id="NumeroCartao" name="NumeroCartao">
                            <input required type="hidden" id="BandeiraCartao" name="BandeiraCartao">
                            <div class="BandeiraCartao"></div>
                        </div>

                    </div>
                    <div>
                        Mês de Validade: <br>
                        <input required type="text" class="formField" id="MesValidade" name="MesValidade" maxlength="2">
                    </div>

                    <div>
                        Ano de Validade: <br>
                        <input required type="text" class="formField" id="AnoValidade" name="AnoValidade" maxlength="4">
                    </div>
                    <div>
                        CVV: <br>
                        <input required type="text" class="formField" id="CVV" name="CVV" maxlength="3">
                    </div>
                </div>

                <div>
                    <div>
                        Quantidade de Parcelas: <br>
                        <select name="QtdParcelas" id="QtdParcelas">
                            <option value="">Selecione</option>
                        </select>
                        <input type="hidden" id="ValorParcelas" name="ValorParcelas">
                    </div>
                    <div>
                        Nome impresso no cartão: <br>
                        <input required type="text" class="formField" id="NomeCartao" name="NomeCartao">
                    </div>
                </div>

                Data de nascimento do proprietário do cartão: <br>
                <div>
                    <div>
                        Dia: <br>
                        <input required type="text" class="formField" id="Dia" name="DiaNasc" maxlength="2">
                    </div>
                    <div>
                        Mês: <br>
                        <select name="MesNasc" id="Mes" required>
                            <option value="01">Janeiro</option>
                            <option value="02">Fevereiro</option>
                            <option value="03">Março</option>
                            <option value="04">Abril</option>
                            <option value="05">Maio</option>
                            <option value="06">Junho</option>
                            <option value="07">Julho</option>
                            <option value="08">Agosto</option>
                            <option value="09">Setembro</option>
                            <option value="10">Outubro</option>
                            <option value="11">Novembro</option>
                            <option value="12">Dezembro</option>
                        </select>
                    </div>
                    <div>
                        Ano: <br>
                        <input required type="text" class="formField" id="Ano" name="AnoNasc" maxlength="4">
                    </div>
                    <div>
                        CPF do dono do Cartao: <br>
                        <input required type="text" class="formField" id="CPFCartao" name="CPFCartao" maxlength="11">
                    </div>
                </div>
                
                <input class="finalizar" id="BotaoComprar" name="BotaoComprar" type="submit" value="Finalizar a compra">
            </div>
        </form>
    </div>