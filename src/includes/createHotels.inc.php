<?php
require_once "../classes/Hotel.class.php";

/**
 * Function that loads 
 * - JSON data
 * - Creates Hotel objects from the data
 * - Populates the SESSION superglobal with objects to be used later 
 */

function createHotels() {

    $_SESSION['hotels'] = [];
    $hotelData = json_decode( file_get_contents("hotelData.json") );    

    foreach ($hotelData as $data) {

        $newHotel = new Hotel( 
            $data->id,
            $data->name,
            $data->rate,
            $data->features
        );

        array_push( $_SESSION['hotels'], $newHotel );
    }
}

createHotels();