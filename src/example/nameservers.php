<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(getNameservers(1234));
//print_r(addNameservers(1234)); // adding multiple nameservers possible
//print_r(editNameservers(1234)); // editing multiple nameservers possible
//print_r(deleteNameservers(1234)); // deleting multiple nameservers possible
exit;


function getNameservers($dnsId)
{
    $nameservers = new \Neostrada\Client\Nameservers();

    return json_decode($nameservers->getNameservers($dnsId));
}

function addNameservers($dnsId)
{
    $param = [
        'content' => [
            'een.dnssrv.nl',
            'twee.dnssrv.nl',
            'drie.dnssrv.nl'
        ]
    ];

    $nameservers = new \Neostrada\Client\Nameservers($param);

    return json_decode($nameservers->addNameservers($dnsId));
}

function editNameservers($dnsId)
{
    $param = [
        'record_id' => 12345678,
        'content' => 'sandra.neostrada.nl',
    ];

    $nameservers = new \Neostrada\Client\Nameservers($param);

    return json_decode($nameservers->editNameservers($dnsId));
}

function deleteNameservers($dnsId)
{
    $param = [
        'record_id' => 12345678,
    ];

    $nameservers = new \Neostrada\Client\Nameservers($param);

    return json_decode($nameservers->deleteNameservers($dnsId));
}