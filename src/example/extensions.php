<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get all extensions with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    /**
     * Get all extensions
     *
     * @Return JSON array
     */
    $extensions = $neo->getExtensions();

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($extensions));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}