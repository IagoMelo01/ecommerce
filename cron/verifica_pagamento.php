<?php

// SDK do Mercado Pago
require __DIR__ .  '/vendor/autoload.php';
// Adicione as credenciais      APP_USR-4368032374631684-082202-bc836533abcb12874fb6c0a694e9df03-677398332
MercadoPago\SDK::setAccessToken('TEST-4095530543103453-030623-d4ac52c3d753775d8d11bc7645b77a11-724265989');


// Cria um objeto de preferência
$preference = new MercadoPago\Preference();

// Cria um item na preferência
$item = new MercadoPago\Item();
$item->title = 'Pedido - Divas Pink';
$item->quantity = 1;
$item->unit_price = $_SESSION['total'];
$preference->items = array($item);
$preference->save();


$total = $_SESSION['total'] + $_SESSION['frete']['vfrete'];

?>