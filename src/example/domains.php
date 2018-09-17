<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 11:04
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(getDomains());
//print_r(getSingleDomain(1234)); // This could be an domain_id (integer) or domain name (string)
//print_r(deleteDomain(1234)); // This could be an domain_id (integer) or domain name (string)
exit;


function getDomains()
{
    $domains = new \Neostrada\Client\Domains();

    return json_decode($domains->getDomains());

}

function getSingleDomain($dom)
{
    $domain = new \Neostrada\Client\Domains();

    return json_decode($domain->getSingleDomain($dom));

}

function deleteDomain($dom)
{
    $domain = new \Neostrada\Client\Domains();

    return json_decode($domain->deleteDomain($dom));

}