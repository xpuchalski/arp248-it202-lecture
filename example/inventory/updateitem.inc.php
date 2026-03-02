<?php
if (!isset($_POST['itemID']) or (!is_numeric($_POST['itemID']))) {
?>
  <h2>You did not select a valid itemID value</h2>
  <a href="index.php?content=listitems">List items</a>
  <?php
} else {
  $itemID = $_POST['itemID'];
  $item = Item::findItem($itemID);
  if ($item) {
  ?>
    <h2>Update Item <?php echo $item->itemID; ?></h2><br>
    <form name="items" action="index.php" method="post">
      <table>
        <tr>
          <td>ItemID</td>
          <td><?php echo $item->itemID; ?></td>
        </tr>
        <tr>
          <td>Name</td>
          <td><input type="text" name="itemName" value="<?php echo $item->itemName; ?>"></td>
        </tr>
        <tr>
          <td>Category:</td>
          <td><select name="categoryID">
              <?php
              echo "<option value=\"0\">Select a Category</option>\n";
              $categories = Category::getCategories();
              if ($categories)
                foreach ($categories as $category) {
                  $categoryID = $category->categoryID;
                  $selected = $categoryID == $item->categoryID ? "selected" : "";
                  echo "<option value=\"$categoryID\" $selected>$category</option>\n";
                }
              ?></td>
        </tr>
        <tr>
          <td>List Price</td>
          <td><input type=" text" name="listPrice" value="<?php echo $item->listPrice; ?>"></td>
        </tr>
      </table><br><br>
      <input type="submit" name="answer" value="Update Item">
      <input type="submit" name="answer" value="Cancel">
      <input type="hidden" name="itemID" value="<?php echo $itemID; ?>">
      <input type="hidden" name="content" value="changeitem">
    </form>
  <?php
  } else {
  ?>
    <h2>Sorry, item <?php echo $itemID; ?> not found</h2>
    <a href="index.php?content=listitems">List items</a>
<?php
  }
}
?>