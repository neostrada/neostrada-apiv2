<?php
/**
 * Created by Neostrada.
 * User: Puya Sarmidani
 * Date: 17-09-18
 * Time: 13:13
 *
 * How to get, add. edit and delete holders from your account with the Neostrada API.
 */

try {
    /*
     * Initialize the Neostrada API library with your API key.
     */
    require "./initialize.php";

    $holderid = 1234;

    /**
     * Get all holders
     *
     * @Return JSON array
     */
    $holders = $neo->getHolders();


    /**
     * Add a new holder
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
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
        ]
    );

    $addHolder = $neo->addHolders();

    /**
     * Edit a holder by holder_id
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'company' => 'Example'
        ]
    );

    $editHolder = $neo->editHolders($holderid);

    /**
     * Delete a holder by holder_id. Multiple holders can be deleted at once.
     *
     * @Return JSON array
     */
    $neo->setParameters(
        [
            'holder_id' => 1234
        ]
    );

    $deleteHolder = $neo->deleteHolders();

    /**
     * Print the result to the screen. Use JSON decode
     */
    echo '<pre>';
    print_r(json_decode($holders));
    exit;

} catch (Exception $e) {
    echo "API call failed: " . htmlspecialchars($e->getMessage());
}