<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get, add, edit and delete dns records with the Neostrada API. You need to call domains to receive an dns_id
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    $dns_id = 1234;

    /**
     * Get all records of a domain
     *
     * @Return JSON array
     */
    $dns = $neo->getDns($dns_id);


    /**
     * Add new records. You can add multiple records with one call. Just create a multidimensional array
     *
     * @Return JSON array
     */
    $neo->setParameters([
        'name' => 'exampledomain.nl',
        'content' => '127.0.0.1',
        'type' => 'A',
        'prio' => 3600,
        'ttl' => 0
    ]);

    $addDns = $neo->addDns($dns_id);

    /**
     * Edit dns records. for editing records, a records_id is required. You can get this id by calling the getDns function
     *
     * @Return JSON array
     */

    $neo->setParameters([
        'record_id' => 12345678,
        'content' => '127.0.0.1',
        'prio' => 3600,
        'ttl' => 0
    ]);

    $editDns = $neo->editDns($dns_id);

    /**
     * Deleting a record. Just pass the records_id.
     *
     * @Return JSON array
     */

    $neo->setParameters([
        'record_id' => 12345678,
    ]);

    $editDns = $neo->editDns($dns_id);


    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($dns));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}