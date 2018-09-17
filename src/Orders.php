<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Orders
{
    protected $parameter;

    public function __construct($parameter = [])
    {
        $this->parameter = $parameter;
    }

    public function getPlannedOrders()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/orders/planned/');
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;

    }

    public function placeOrder()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/orders/add/');
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;
    }
}