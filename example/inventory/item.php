<?php
require_once('database.php');
class Item
{
   public $itemID;
   public $itemName;
   public $categoryID;
   public $listPrice;
   function __construct(
        $itemID,
        $itemName,
        $categoryID,
        $listPrice
       ) {
       $this->itemID = $itemID;
       $this->itemName = $itemName;
       $this->categoryID = $categoryID;
       $this->listPrice = $listPrice;
   }
   static function findItem($itemID)
   {
       $db = getDB();
       $query = "SELECT * FROM guitar_items WHERE item_id = $itemID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $item = new Item(
               $row['item_id'],
               $row['item_name'],
               $row['category_id'],
               $row['list_price']
           );
           $db->close();
           return $item;
       } else {
           $db->close();
           return NULL;
       }
   }
   function __toString()
   {
       $output = "<h2>Item : $this->itemID</h2>" .
           "<h2>Name: $this->itemName</h2>\n";
       "<h2>Category ID: $this->categoryID at $this->listPrice</h2>\n";
       return $output;
   }
   function saveItem()
   {
       $db = getDB();
       $query = "INSERT INTO guitar_items VALUES (?, ?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "isid",
           $this->itemID,     // integer data type
           $this->itemName,   // string data type
           $this->categoryID, // integer data type
           $this->listPrice   // float data type
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
    static function getItems()
   {
       $db = getDB();
       $query = "SELECT * FROM guitar_items";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $items = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $item = new Item(
                   $row['item_id'],
                   $row['item_name'],
                   $row['category_id'],
                   $row['list_price']
               );
               array_push($items, $item);
           }
           $db->close();
           return $items;
       } else {
           $db->close();
           return NULL;
       }
   }

   function removeItem()
   {
       $db = getDB();
       $query = "DELETE FROM guitar_items WHERE item_id = $this->itemID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }

   function updateItem()
   {
       $db = getDB();
       $query = "UPDATE guitar_items SET item_name= ?, " .
           "category_id= ?, list_price= ? WHERE item_id = $this->itemID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sid",
           $this->itemName,
           $this->categoryID,
           $this->listPrice
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
}
?>
