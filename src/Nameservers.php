<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Nameservers
{
    protected $parameter;
    protected $query;

    public function __construct($parameter = [], $query = [])
    {
        $this->parameter = $parameter;
        $this->query = $query;
    }

    public function getNameservers($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/nameservers/'.$id);
        $neostrada->setQuery($this->query);
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;
    }

    public function addNameservers($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/nameservers/add/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;
    }

    public function editNameservers($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/nameservers/edit/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('PATCH');

        $response = $neostrada->call();
        return $response;
    }

    public function deleteNameservers($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/nameservers/delete/'.$id);
        $neostrada->setParameters($this->parameter);
        $neostrada->setMethod('DELETE');

        $response = $neostrada->call();
        return $response;
    }
}