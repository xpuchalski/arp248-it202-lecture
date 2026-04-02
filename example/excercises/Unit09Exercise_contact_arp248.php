<?php
// Xander Puchalski, it202, Exercise 9, xdp248@njit.edu
require_once('database.php');
class Contact
{
   public $name;
   public $email;
   public $message;
   function __construct($name, $email, $message)
   {
       $this->name = $name;
       $this->email = $email;
       $this->message = $message;
   }
   function saveContact()
   {
       $db = getDB();
       $query = "INSERT INTO contacts_arp248 (name, email, message) VALUES (?, ?, ?)";
       $stmt = $db->prepare($query);
       $stmt->bind_param(
           "sss",
           $this->name,
           $this->email,
           $this->message
       );
       $result = $stmt->execute();
       $db->close();
       return $result;
   }
}
?>