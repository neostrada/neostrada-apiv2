<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to receive future transfers and placing an order with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    /**
     * Get all future transferred orders
     *
     * @Return JSON array
     */
    $orders = $neo->getPlannedOrders();


    /**
     * Placing an order.
     * You can place multiple orders at once.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'extension_id' => 4,
            'domain' => 'example-order.nl',
            'year' => 1
        ]
    );

//    $placeOrder = $neo->placeOrder(); // Commented to avoid placing orders by accident

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($orders));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}