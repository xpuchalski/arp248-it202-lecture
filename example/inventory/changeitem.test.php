<?php
require_once("item.php");
$itemID = $_POST['itemID'];
if ((trim($itemID) == '') or (!is_numeric($itemID))) {
   echo "<h2>Sorry, you must enter a valid item ID</h2>\n";
} else if (!Item::findItem($itemID)) {
   echo "<h2>Sorry, An item with ID #$itemID does not exist</h2>\n";
} else {
   $item = Item::findItem($itemID);
   $item->itemID = $_POST['itemID'];
   $item->itemName = $_POST['itemName'];
   $item->categoryID = !empty($_POST['categoryID']) ? $_POST['categoryID'] : NULL;
   $item->listPrice = $_POST['listPrice'];
   $result = $item->updateItem();
   if ($result) {
       echo "<h2>Item $itemID updated</h2>\n";
   } else {
       echo "<h2>Problem updating item $itemID</h2>\n";
   }
}
?>
