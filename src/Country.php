<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 10:09
 */

namespace Neostrada\Client;

use Neostrada\Client\lib\NeoClient;

class Country
{

    public function getCountries()
    {
        $neostrada = new NeoClient();
        $neostrada->setRoute('/countries');
        $neostrada->setMethod('GET');

        $response = $neostrada->call();
        return $response;

    }
}