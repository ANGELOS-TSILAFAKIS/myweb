
<?php// χρειαζεται για ολα τα session start  
  session_start();
  if (!isset($_SESSION['username'])) {
     header("Location: homepage.php?msg=Πρέπει να κάνεις login!");
     exit();
  }   
 ?>