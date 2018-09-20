<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to check availabilities of domains with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    /**
     * Whois domain.
     * domain can be a name or name and extension.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'domain' => 'example-url',
            'page' => 1
        ]
    );
    $whois = $neo->whois();


    /**
     * Bulk whois multiple domain names.
     * Extension is required.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'domain' => [
                'example-url.nl',
                'example-url.com',
                'example-url.be'
            ]
        ]
    );

    $bulkWhois = $neo->bulkWhois(); // Commented to avoid placing orders by accident

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($whois));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}