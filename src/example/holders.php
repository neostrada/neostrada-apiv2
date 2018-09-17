<?php
/**
 * Created by Developerlab.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 */

require("../../vendor/autoload.php");


echo '<pre>';
print_r(getHolders());
//print_r(addHolder());
//print_r(editHolders(1234));
//print_r(deleteHolder(1234));
exit;


function getHolders()
{
    $holders = new \Neostrada\Client\Holder();

    return json_decode($holders->getHolders());
}

function addHolder()
{
    $param = [
        'company' => 'Example',
        'firstname' => 'John',
        'lastname' => 'Doe',
        'phone_number' => '612345678',
        'street' => 'straatnaam',
        'house_number' => '1',
        'zipcode' => '1234 AB',
        'city' => 'Lelystad',
        'country_id' => 1,
        'email' => 'john.doe@example.nl',
    ];

    $holders = new \Neostrada\Client\Holder($param);

    return json_decode($holders->addHolders());
}

function editHolders($holderId)
{
    $param = [
        'company' => 'new Company'
    ];

    $holders = new \Neostrada\Client\Holder($param);

    return json_decode($holders->editHolders($holderId));
}

function deleteHolder($holderId)
{
    $param = [
        'holder_id' => $holderId
    ];

    $holders = new \Neostrada\Client\Holder($param);

    return json_decode($holders->deleteHolders());
}