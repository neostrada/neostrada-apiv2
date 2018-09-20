<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get, add, edit and delete nameservers of a domain with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    $dnsId = 1234;

    /**
     * Get all nameservers
     *
     * @Return JSON array
     */
    $nameservers = $neo->getNameservers($dnsId);


    /**
     * Add a new nameserver.
     * Multiple nameservers can be added at once
     *
     * @Return JSON array
     */
    $neo->setParameters([
        'content' => [
            'een.dnssrv.nl',
            'twee.dnssrv.nl',
            'drie.dnssrv.nl'
            ]
        ])
    ;

    $addNameservers = $neo->addNameservers($dnsId);

    /**
     * Edit a nameserver. Need to send a record_id of the record you want to edit.
     * Multiple records can be edited at once.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'record_id' => 12345678,
            'content' => 'sandra.neostrada.nl',
        ]
    );

    $editNameservers = $neo->editNameservers($dnsId);

    /**
     * Delete a nameserver.
     * Multiple nameservers can be deleted at once.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'record_id' => 12345678,
        ]
    );
    $deleteNameservers = $neo->deleteNameservers($dnsId);

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($nameservers));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}