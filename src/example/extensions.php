<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 11:04
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(exampleExtensions());
exit;


function exampleExtensions()
{
    $extensions = new \Neostrada\Client\Extensions();

    return json_decode($extensions->getExtensions());

}