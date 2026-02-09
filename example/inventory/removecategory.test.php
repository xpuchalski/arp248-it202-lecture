<?php
error_log('$_POST ' . print_r($_POST, true));
require_once("category.php");
$categoryID = $_POST['categoryID'];
if ((trim($categoryID) == '') or (!is_numeric($categoryID))) {
 echo "<h2>Sorry, you must enter a valid categoryID</h2>\n";
} else if (!Category::findCategory($categoryID)) {
 echo "<h2>Sorry, A category with ID #$categoryID does not exist</h2>\n";
} else {
 $categoryID = $_POST['categoryID'];
 $category = Category::findCategory($categoryID);
 $result = $category->removeCategory();
 if ($result)
   echo "<h2>Category $categoryID removed</h2>\n";
 else
   echo "<h2>Sorry, problem removing category $categoryID</h2>\n";
}
?>