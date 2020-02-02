<?php
//check for required fields from the form

if ((!isset($_POST["username"])) || (!isset($_POST["password"]))) {
	header("Location: homepage.php");
	exit;
}
//connect to server and select database
$mysqli = mysqli_connect("localhost", "root", "012345asdf", "db_name_practice");

//create and issue the query
$sql = "SELECT username , password , level_A , efforts
         FROM student_registration
		 WHERE username = '".$_POST["username"]."' AND password = SHA1('".$_POST["password"]."')
		 
		 ";
$result = mysqli_query($mysqli, $sql) 
          or die(mysqli_error($mysqli));

//get the number of rows in the result set; should be 1 if a match
if (mysqli_num_rows($result) == 1) {

	//if authorized, get the values of f_name l_name
	while ($info = mysqli_fetch_array($result)) {
		$username = stripslashes($info['username']);
		$password = stripslashes($info['password']);
		$level_A = stripslashes($info['level_A']);
		$efforts = stripslashes($info['efforts']);
	}		
//ακομη και εαν δωσεις σωστο κωδικο δεν σου δινει την αδεια ΕΞΟΥΣΙΟΔΩΤΗΣΗΣ .αυτο γινεται για την προστασια απο χακερ .
	   if ( $efforts > 10  ) {
   			header("Location: homepage.php");
			exit();
         }

	//set authorization cookie
	//setcookie("auth", "1", 0, "/", "yourdomain.com", 0);
	
	// ΤΑ ΑΝΑΛΟΓΑ  $_SESSION
	session_start();    // ξεκινάμε το session 
   $_SESSION['username'] = $_POST['username'];
   //$_SESSION['time'] = now();
   $_SESSION['level'] = $level_A; // 0 για επισκεπτη ,1 για φοιτητη ,2 για καθηγητη...
   $_SESSION['password'] = $password;
     
   $efforts = 0;
   
   	    $efforts_student =   "UPDATE student_registration 
		                         SET efforts = $efforts
								 WHERE username = '".$_POST["username"]."'
								 ";
		// η ματαβλητη υπαρχει $mysqli στο include.php
		 $efforts_student_result = mysqli_query($mysqli,  $efforts_student)
		                                 or die(mysqli_error($mysqli));
										 								 							
		 mysqli_close($mysqli);
   	
	//ΓΙΑ ΤΟ level_A  . για το αν θα ειναι καθηγητης η θα ειναι φοιτητης
	
	//αν θα ειναι καθηγητης
    if ($level_A == 2 )   {
        
		header("Location: homepage.php");	
			
	} else if  ($level_A == 1)	{	
	
         header("Location: homepage.php");	
	
	}
	  	
} else {

   // η μεταβλητη αυτη ειναι για ποσες προσπαθειες μπορει να κανει ο χρηστης . εδω συγκεκριμενα μεχρι τρεις.
   
		$sql = "SELECT username , efforts
				 FROM student_registration
				 WHERE username = '".$_POST["username"]."' 
				 
				 ";
		$result = mysqli_query($mysqli, $sql) 
				  or die(mysqli_error($mysqli));

		//get the number of rows in the result set; should be 1 if a match
		if (mysqli_num_rows($result) == 1) {

					//if authorized, get the values of f_name l_name
					while ($info = mysqli_fetch_array($result)) {
						$username = stripslashes($info['username']);
						$efforts = stripslashes($info['efforts']);
					}
		   
			$efforts =  $efforts + 1;
						
				$efforts_student = "UPDATE student_registration 
										 SET efforts = $efforts
										 WHERE username = '".$_POST["username"]."'
										 ";
				// η ματαβλητη υπαρχει $mysqli στο include.php
				 $efforts_student_result = mysqli_query($mysqli,  $efforts_student)
												 or die(mysqli_error($mysqli));
																											
				 mysqli_close($mysqli);
						
			//redirect(ανακατευθυνση) back to login form if not authorized
			header("Location: homepage.php");
			exit;
	    }
	header("Location: homepage.php");	
}
?>

