<?php
   define('SERVER', 'localhost:3307');
   define('USERNAME', 'root');
   define('PASSWORD', 'password');
   define('DATABASE', 'database');
   $db = mysqli_connect(SERVER,USERNAME,PASSWORD,DATABASE);
   if (mysqli_query($conn, $sql)) {
    echo "Created successfully";
  } else {
    echo "Error creating" . mysqli_error($conn);
  }
  mysqli_close($conn);   
?>