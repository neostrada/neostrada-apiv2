<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 16:51
 */

require("../../vendor/autoload.php");

echo '<pre>';
print_r(plannedOrders());
//print_r(placeOrder()); // WARNING this will place an order. Authcode and holder_id are optional.
exit;


function plannedOrders()
{
    $orders = new \Neostrada\Client\Orders();

    return json_decode($orders->getPlannedOrders());
}

function placeOrder()
{
    $param = [
        'extension_id' => 4,
        'domain' => 'example-order.nl',
        'year' => 1
    ];

    $orders = new \Neostrada\Client\Orders($param);

//    return json_decode($orders->placeOrder()); // Disabled to avoid sample orders.
}