<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get, delete domains from your account with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    /**
     * Get all domains
     *
     * @Return JSON array
     */
    $domains = $neo->getDomains();


    /**
     * Get a single domain by domain_id or domain name
     *
     * @Return JSON array
     */
    $domain = 1234;

    $singleDomain = $neo->getSingleDomain($domain);

    /**
     * Cancel domain renewal by domain_id or domain name
     *
     * @Return JSON array
     */

    $deleteDomain = $neo->deleteDomain($domain);

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($domains));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}