<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 16:46
 */
require("../../vendor/autoload.php");

echo '<pre>';
print_r(getCountries());
exit;


function getCountries()
{
    $countries = new \Neostrada\Client\Country();

    return json_decode($countries->getCountries());

}