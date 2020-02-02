<?php
/*
χρησιμοποιειται για το html
ειναι υπευθυνος ο παρακατω κωδικας για την συνδεση της βασης δεδομενων 
*/

session_start(); // ok 
function includedatabase() {
	global $mysqli;

	//συνδεση με την βαση
	$mysqli = mysqli_connect("localhost", "root", "012345asdf", "db_name_practice");
		

	
	//αν η συνδεση αποτυχει, διακοπη της εκτελεσης του script
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
}
?>	  
   