<?php
require_once("category.php");
$categoryID = $_POST['categoryID'];
if ((trim($categoryID) == '') or (!is_numeric($categoryID))) {
  echo "<h2>Sorry, you must enter a valid category ID</h2>\n";
} else if (!Category::findCategory($categoryID)) {
  echo "<h2>Sorry, A category with ID #$categoryID does not exist</h2>\n";
} else {
  $category = Category::findCategory($categoryID);
  $category->categoryID = $_POST['categoryID'];
  $category->categoryCode = $_POST['categoryCode'];
  $category->categoryName = $_POST['categoryName'];
  $result = $category->updateCategory();
  if ($result) {
     echo "<h2>Category $categoryID updated</h2>\n";
  } else {
     echo "<h2>Problem updating category $categoryID</h2>\n";
  }
}
?>