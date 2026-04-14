<?php
ob_start();
// Personalized “fun" data for this student
$favoriteSnack = "food";     // Favorite Snack
$energyLevel = 1;         // Current Energy Level (0–100)
$favoriteShow = "dbz";      // Favorite Streaming Show
$favoriteGame = "ror2";      // Favorite Game
$coffeeCups = 0;          // Coffee Cups Today
$studentInfo = "X Puchalski, it202, intro web dev probably, exercise 11, arp248@njit.edu";
$doc = new DOMDocument("1.0");
$rootElement = $doc->createElement("root");
$rootElement = $doc->appendChild($rootElement);
$funElement = $doc->createElement("fun");
$funElement = $rootElement->appendChild($funElement);
// Snack
$snackElement = $doc->createElement("snack", $favoriteSnack);
$snackElement = $funElement->appendChild($snackElement);
// Energy
$energyElement = $doc->createElement("energy", $energyLevel);
$energyElement = $funElement->appendChild($energyElement);
// Show
$showElement = $doc->createElement("show", $favoriteShow);
$showElement = $funElement->appendChild($showElement);
// Game
$gameElement = $doc->createElement("game", $favoriteGame);
$gameElement = $funElement->appendChild($gameElement);
// Coffee Cups
$coffeeElement = $doc->createElement("coffee", $coffeeCups);
$coffeeElement = $funElement->appendChild($coffeeElement);
$nameElement = $doc->createElement("info");
$nameElement = $rootElement->appendChild($nameElement);
// Student Info
$snackElement = $doc->createElement("student", $studentInfo);
$snackElement = $nameElement->appendChild($snackElement);
header("Content-type: application/xml");
ob_end_clean();
echo $doc->saveXML();
?>