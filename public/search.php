<?php
    /**
     * search.php
     *
     * Computer Science 50
     * Problem Set 8
     *
     * 
     *
     * Search for places that matches user's input.
     */

    require(__DIR__ . "/../includes/config.php");
    // numerically indexed array of places
    $places = [];
    // TODO: search database for places matching $_GET["geo"]
    $places = CS50::query("SELECT * FROM places WHERE MATCH(country_code,postal_code, place_name, admin_name1,admin_code1)
		     AGAINST (?) LIMIT 40", $_GET["geo"]);
    // output places as JSON (pretty-printed for debugging convenience)
    header("Content-type: application/json");
    print(json_encode($places, JSON_PRETTY_PRINT));
?>
