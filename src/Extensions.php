<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Extensions
{

    public function getExtensions()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/extensions');
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;

    }
}