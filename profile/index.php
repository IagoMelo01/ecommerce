<?php
include './header.php'; ?>


<div>
<div class="container">
        <div class="side-menu">
            <a href="pedido.php">
                <div class="item">
                    <div>
                        <span>Pedidos</span>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="dados.php">
                <div class="item">
                    <div>
                        <span>Seus dados</span>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="endereco.php">
                <div class="item">
                    <div>
                        <span>Endereço</span>
                    </div>
                    <div class="barra-horizontal"></div>
                </div>
            </a>

            <a href="">
                <div class="item">
                    <div>
                        <span>Sair</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<div>
   <div class="myorders">
                <h1 class="title pc">Pedidos</h1>


                <?php 
                
                    $id = $_SESSION['dados']['id'];
                    $consulta_pedidos = $conn->query("SELECT * FROM `vendas` WHERE id='$id'");

                    $pedidos = [];
                    while($pedidos[] = $consulta_pedidos->fetch_assoc())
                    foreach($pedidos as $key){

                        $situacao = $key['situacao'];

                        $num = $key['id']; while(strlen($num) < 15){$num = '0' . $num;} 
                     ?>
                
                
                    <div class="card">
                        <h1 class="title mobile">Pedidos</h1>
                        <div class="container-product">
                            <img class="img-product" src="<?php echo '../' . $key['foto']; ?>" alt="">
                            <div class="product-content">
                                <b><?php echo $num; ?></b>
                                <span3>Endereço de entrega: <strong><?php echo $key['endereco']; ?></strong></span3><br>
                                <span3>Frete: <strong><?php echo $key['frete']; ?></strong></span3><br>
                                <span3>Quantidade: <strong><?php echo $key['quantidade']; ?></strong></span3><br>
                                <span3>Valor do pedido: <strong><?php echo 'R$ ' . $key['valor']; ?></strong></span3>
                            </div>
                        </div>
                        
                        <div class="container-tracking">
                            <div class="tracking">
                                <span3>Status do pedido: <br> <strong><?php echo $situacao; if($situacao == 'Pedido entregue'){ echo date('d-m-Y h:i', $key['situacao']); } ?></strong></span3>
                            </div>
                            <div class="actions">
                                <button>TROCAR PRODUTO</button>
                            </div>
                        </div>

                        <div class="container-summary pc">
                            <b>Resumo da compra</b>
                            <span3>Pedido: <strong><?php echo $num; ?></strong></span3><br><br>
                            <span3>Data do pedido: <strong><?php echo date('d/m/Y' , $key['data']) ; ?></strong></span3><br><br>
                            <span3>Forma de pagamento: <strong><?php echo $key['pagamento']; ?></strong></span3>
                            <div class="actions">
                                <button>DETALHES</button>
                            </div>
                        </div>

                        <div class="container-summary mobile">
                            <span3>Pedido: <strong><?php echo $num; ?></strong></span3><br>
                            <span3>Data do pedido: <strong><?php echo date('d/m/Y' , $key['data']) ; ?></strong></span3><br>
                            <span3>Valor total: <strong><?php echo $key['valor'] ; ?></strong></span3><br>
                            <div class="actions">
                                <button>DETALHES</button>
                            </div>
                        </div>
                    </div> <br><br>
                
                <?php } ?>
        </div> 
</div>
            
    </div>
</body>

</html>