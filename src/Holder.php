<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Holder
{
    protected $parameter;

    public function __construct($parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function getHolders()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/holders');
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;

    }

    public function addHolders()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/holders/add');
        $neostrada->setParameters($this->parameters);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;
    }

    public function editHolders($holderId)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/holders/edit/'.$holderId);
        $neostrada->setParameters($this->parameters);
        $neostrada->setMethod('PATCH');

        $response = $neostrada->call();
        return $response;
    }

    public function deleteHolders()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/holders/delete/');
        $neostrada->setParameters($this->parameters);
        $neostrada->setMethod('DELETE');

        $response = $neostrada->call();
        return $response;
    }
}