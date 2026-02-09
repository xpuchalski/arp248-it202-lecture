<?php
require_once("category.php");
$categories = Category::getCategories();
if ($categories) {
  foreach ($categories as $category) {
     $categoryID = $category->categoryID;
     $name = $categoryID . " - " . $category->categoryCode . ", " . $category->categoryName;
     echo "$name<br>";
  }
} else {
  echo "<h2>No categories found.</h2>";
}
?>
