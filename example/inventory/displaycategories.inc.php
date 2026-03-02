<?php
if (!isset($_REQUEST['categoryID']) or (!is_numeric($_REQUEST['categoryID']))) {
?>
 <h2>You did not select a valid categoryID to view.</h2>
 <a href="index.php?content=listcategories">List Categories</a>
 <?php
} else {
 $categoryID = $_REQUEST['categoryID'];
 $category = Category::findCategory($categoryID);
 if ($category) {
   echo $category;
   $items = Item::getItemsByCategory($categoryID);
   if ($items) {
 ?>
     <br><br>
     <b>Items:</b><br>
     <table>
       <tr>
         <th>Item</th>
         <th>Name</th>
         <th>Price</th>
       </tr>
       <?php
       $itemtotal = 0;
       foreach ($items as $item) {
       ?>
         <tr>
           <td><?php echo $item->itemID; ?></td>
           <td><?php echo $item->itemName; ?></td>
           <td><?php echo $item->listPrice; ?></td>
         </tr>
       <?php
         $itemtotal = $itemtotal + $item->listPrice;
       }
       ?>
       <tr>
         <td></td>
         <td>Total</td>
         <td><?php echo '$' . number_format($itemtotal, 2); ?></td>
       </tr>
     </table>
<?php
   } else {
     echo "<h2>There are no items for this category</h2>\n";
   }
 } else {
   echo "<h2>Sorry, category $categoryID not found</h2>\n";
 }
}
?>