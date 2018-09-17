<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Whois
{
    protected $parameters;

    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    public function whois()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/whois');
        $neostrada->setParameters($this->parameters);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;

    }

    public function bulkWhois()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/bulkwhois');
        $neostrada->setParameters($this->parameters);
        $neostrada->setMethod('POST');

        $response = $neostrada->call();
        return $response;

    }
}