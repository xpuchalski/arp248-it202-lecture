<?php
require_once("item.php");
$items = Item::getItems();
if ($items) {
?>
 <h2>Select Item</h2>
  <form name="items" method="post">
   <select name="itemID" size="20">
       <?php
       $first = true;
       foreach ($items as $item) {
           $itemID = $item->itemID;
           $itemName = $item->itemName;
           $itemPrice = $item->listPrice;
           $option = $itemID . " - " . $itemName .  " - " . $itemPrice;
           if($first) {
                echo "<option value=\"$itemID\" selected>$option</option>\n";
                $first = false;
           } else {
                echo "<option value=\"$itemID\">$option</option>\n";
           }
       }
       ?>
   </select>
 </form>
<?php
} else {
  echo "<h2>No items found.</h2>";
}
?>