<?php
/**
 * Created by PhpStorm.
 * User: kelly
 * Date: 9/23/2018
 * Time: 12:39 PM
 */

<html>
<head>
    <meta charset="UTF-8">
    <title>Final Project - Classifieds Site - List Item</title>
</head>
<body>
<h1>List Item to Sell</h1>

<?php
  // create short variable names
  $title=$_POST['title'];
  $description=$_POST['description'];
  $image=$_POST['image'];
  $category=$_POST['category'];
  $price = $_POST['price'];

if (!$title || !$description || !$image || !$category || !$price) {
     echo "You have not entered all the required details.<br />"
          ."Please go back and try again.";
     exit;
  }

  if (!get_magic_quotes_gpc()) {
    $title = addslashes($title);
    $description = addslashes($description);
    $image = addslashes($image);
    $category = addslashes($category);
    $price = doubleval($price);
  }

  @ $db = new mysqli('koetze01.com', 'koetzeze_root', 'password123', 'auctions');

  if (mysqli_connect_errno()) {
     echo "Error: Could not connect to database.  Please try again later.";
     exit;
  }

  $query = "insert into products values
            ('".$title."', '".$desccription."', '".$image."', '".$category."', '"$price')";
  $result = $db->query($query);

  if ($result) {
      echo  $db->affected_rows." is now for sale!.";
  } else {
  	  echo "An error has occurred.  Your item has not been listed. Please try again.";
  }

  $db->close();
?>
</body>
</html>