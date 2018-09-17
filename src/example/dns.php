<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(getDns(1234, ['type' => 'A'])); // type is optional
//print_r(addDns(1234)); // adding multiple arrays possible
//print_r(editDns(1234)); // editing multiple records possible
//print_r(deleteDns(1234)); // editing multiple records possible
exit;


function getDns($dnsId, $type = [])
{
    $dns = new \Neostrada\Client\Dns([], $type);

    return json_decode($dns->getDns($dnsId));
}

function addDns($dnsId)
{
    $param = [
        'name' => 'exampledomain.nl',
        'content' => '127.0.0.1',
        'type' => 'A',
        'prio' => 3600,
        'ttl' => 0
    ];

    $dns = new \Neostrada\Client\Dns($param);

    return json_decode($dns->addDns($dnsId));
}

function editDns($dnsId)
{
    $param = [
        'record_id' => 12345678,
        'content' => '127.0.0.1',
        'prio' => 3600,
        'ttl' => 0
    ];

    $dns = new \Neostrada\Client\Dns($param);

    return json_decode($dns->editDns($dnsId));
}

function deleteDns($dnsId)
{
    $param = [
        'record_id' => 12345678,
    ];

    $dns = new \Neostrada\Client\Dns($param);

    return json_decode($dns->deleteDns($dnsId));
}