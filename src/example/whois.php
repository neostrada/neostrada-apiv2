<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 11:04
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(exampleWhois());
//print_r(exampleBulkWhois());
exit;


function exampleWhois()
{
    $param = [
        'domain' => 'example-url',
        'page' => 1
    ];

    $whois = new \Neostrada\Client\Whois($param);

    return json_decode($whois->whois());

}

function exampleBulkWhois()
{
    $param = [
        'domain' => [
            'example-url.nl',
            'example-url.com',
            'example-url.be'
        ]
    ];

    $whois = new \Neostrada\Client\Whois($param);

    return json_decode($whois->bulkWhois());
}