<?php
 error_log('$_POST ' . print_r($_POST, true));
 require_once('database.php');
 $emailAddress = $_POST['email_address'];
 $password = $_POST['password'];
 $query = "SELECT first_name, last_name FROM guitar_users " .
        "WHERE email_address = ? AND password = SHA2(?,256)";
 $db = getDB();
 $stmt = $db->prepare($query);
 $stmt->bind_param("ss", $emailAddress, $password);
 $stmt->execute();
 $stmt->bind_result($firstName, $lastName);
 $fetched = $stmt->fetch();
 $db->close();
 $name = "$firstName $lastName";
 if ($fetched && isset($name)) {
   $_SESSION['login'] = $name;
   header("Location: index.php");
 } else {
   echo "<h2>Sorry, login incorrect</h2>\n";
   echo "<a href=\"index.php\">Please try again</a>\n";
 }
?>
