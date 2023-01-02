<?php
  include 'admin/php_files/database.php';

  // $hostname = "http://localhost/shoppingproject-yb";
  $hostname = "http://localhost/shopping-project";
    $db_host1 = "localhost";  // Change as required
    $db_user1 = "root";       // Change as required
    $db_pass1 = "";   // Change as required
    $db_name1 = "shopping_db";   // Change as required

    $conn1 = mysqli_connect($db_host1, $db_user1, $db_pass1, $db_name1);
    
?>