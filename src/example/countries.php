<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get countries with the Neostrada API. Countries are required to add and/or edit Holder info
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    /**
     * Get all countries
     *
     * @Return JSON array
     */

    $countries = $neo->getCountries();

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($countries));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}