<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Dns
{
    protected $parameter;
    protected $query;

    public function __construct($parameter = [], $query = [])
    {
        $this->parameter = $parameter;
        $this->query = $query;
    }

    public function getDns($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/dns/'.$id);
        $neostrada->setQuery($this->query);
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;
    }

    public function addDns($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/dns/add/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;
    }

    public function editDns($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/dns/edit/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('PATCH');

        $response = $neostrada->call();
        return $response;
    }

    public function deleteDns($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/dns/delete/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('DELETE');

        $response = $neostrada->call();
        return $response;
    }
}