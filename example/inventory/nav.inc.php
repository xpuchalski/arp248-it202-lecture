  <?php
   if (isset($_SESSION['login'])) {
   ?>
    <div class="navigation" style="float: left; height: 100%; min-width: 175px; width: auto;">
      <table width="100%" cellpadding="3">
        <?php
         echo "<td><h3>Welcome, {$_SESSION['login']}</h3></td>";
         ?>
        <tr>
          <td><a href="index.php"><strong>Home</strong></a></td>
        </tr>
        <tr>
          <td><strong>Categories</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listcategories">
              <strong>List Categories</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newcategory">
              <strong>Add New Category</strong></a></td>
        </tr>
        <tr>
          <td><strong>Items</strong></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=listitems">
              <strong>List Items</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;<a href="index.php?content=newitem">
              <strong>Add New Item</strong></a></td>
        </tr>
        <tr>
          <td>
            <hr />
          </td>
        </tr>
        <tr>
          <td><a href="index.php?content=logout">
              <strong>Logout</strong></a></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Item:</label><br>
              <input type="text" name="itemID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="updateitem" />
            </form>
          </td>
        </tr>
        <tr>
          <td>
            <form action="index.php" method="post">
              <label>Search for Category:</label><br>
              <input type="text" name="categoryID" size="14" />
              <input type="submit" value="find" />
              <input type="hidden" name="content" value="displaycategory" />
            </form>
          </td>
        </tr>
      </table>
    </div>
  <?php
   }
   ?>