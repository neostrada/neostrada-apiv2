<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Domains
{
    protected $parameters = array();

    protected $query;

    public function __construct($parameters = [], $query = '')
    {
        $this->parameters = $parameters;
    }

    public function getDomains()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/domains');
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;

    }

    public function getSingleDomain($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/domain/'.$id);
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;
    }

    public function deleteDomain($id)
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/domain/delete/'.$id);
        $neostrada->setMethod('DELETE');

        $response = $neostrada->call();
        return $response;
    }
}