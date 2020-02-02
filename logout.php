<?php	
	session_start();    // επανασύνδεση με το υπάρχων session με σκοπό....
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	unset($_SESSION['time']);
	unset($_SESSION['level']);
	unset($_SESSION['$request_master_id']);
	unset($_SESSION['subject_meet_practice_id']);  //  στο profesor_see_students_B 88 σειρα
     session_destroy();  // ...την καταστροφή του!
     header("Location: homepage.php?msg=Πρόβλημα - Δοκίμασε ξανά!");	 
	 exit();
?>





