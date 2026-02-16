<?php
require_once("item.php");
$items = Item::getItems();
if ($items) {
  foreach ($items as $item) {
     $itemID = $item->itemID;
     $itemName = $item->itemName;
     $itemPrice = $item->listPrice;
     $option = $itemID . " - " . $itemName .  " - " . $itemPrice;
     echo "$option<br>";
  }
} else {
   echo "<h2>No items found.</h2>";
}
?>