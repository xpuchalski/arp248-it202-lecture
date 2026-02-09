<?php
require_once('database.php');
class Category
{
   public $categoryID;
   public $categoryCode;
   public $categoryName;
   function __construct($categoryID, $categoryCode, $categoryName)
   {
       $this->categoryID = $categoryID;
       $this->categoryCode = $categoryCode;
       $this->categoryName = $categoryName;
   }
   function __toString()
   {
       $output = "<h2>$this->categoryID - $this->categoryCode, $this->categoryName</h2>\n";
       return $output;
   }
   static function findCategory($categoryID)
   {
       $db = getDB();
       $query = "SELECT * FROM guitar_categories WHERE category_id = $categoryID";
       $result = $db->query($query);
       $row = $result->fetch_array(MYSQLI_ASSOC);
       if ($row) {
           $category = new Category(
               $row['category_id'],
               $row['category_code'],
               $row['category_name']
           );
           $db->close();
           return $category;
       } else {
           $db->close();
           return NULL;
       }
   }
   function saveCategory()
   {
       $db = getDB();
       $query = "INSERT INTO guitar_categories VALUES (?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "iss",
           $this->categoryID,
           $this->categoryCode,
           $this->categoryName
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
    static function getCategories()
   {
       $db = getDB();
       $query = "SELECT * FROM guitar_categories";
       $result = $db->query($query);
       if (mysqli_num_rows($result) > 0) {
           $categories = array();
           while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
               $category = new Category(
                   $row['category_id'],
                   $row['category_code'],
                   $row['category_name']
               );
               array_push($categories, $category);
               unset($category);
           }
           $db->close();
           return $categories;
       } else {
           $db->close();
           return NULL;
       }
   }

   function removeCategory()
   {
       $db = getDB();
       $query = "DELETE FROM guitar_categories WHERE category_id = $this->categoryID";
       $result = $db->query($query);
       $db->close();
       return $result;
   }
      function updateCategory()
   {
       $db = getDB();
       $query = "UPDATE guitar_categories SET category_code = ?, " .
           "category_name = ? " .
           "WHERE category_id = $this->categoryID";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "ss",
           $this->categoryCode,
           $this->categoryName
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }

}
?>
