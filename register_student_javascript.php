
<?php    
	
$username = $password = $afm =  $name = $surname = "";
	
//5 δεδομενα	

if (isset($_POST["username"])){
$username = fix_string($_POST["username"]);
}	
if(isset($_POST["password"])){
  $password = fix_string($_POST["password"]);
}	
if(isset($_POST["afm"])){
  $afm = fix_string($_POST["afm"]);
}	
if(isset($_POST["name"])){
  $name = fix_string($_POST["name"]);
}
if(isset($_POST["surname"])){
  $surname = fix_string($_POST["surname"]);
}



$fail =  validate_username($username,"το ονομα_χρηστη δεν συμπληρωθηκε <br />",8,40,"ονομα_χρηστη ");

$fail .=  validate_password($password,"ο κωδικος_χρηστη δεν συμπληρωθηκε <br />",8,40,"κωδικος_χρηστη ");

$fail .=  validate_string_varchar($afm,"ο αριθμος_μητρωου δεν συμπληρωθηκε <br />",3,40,"αριθμος_μητρωου ");

$fail .=  validate_string_varchar($name,"το ονομα δεν συμπληρωθηκε <br />",3,40,"ονομα");

$fail .=  validate_string_varchar($surname,"το επωνυμο δεν συμπληρωθηκε <br />",3,40,"επωνυμο ");



if ($fail == "") {

// εδω ειναι που εισαγω τα δεδομενα στην βαση

	includedatabase();

		//αφου οι καθηγητες θα ειναι και admin ολοι οι αλλοι 1. οι καθηγητες θα εχουν 2 .
		$level = 1;
		$efforts = 0;						
		$student_registration = "INSERT INTO student_registration (student_registration_id,
		                          username, password, afm, name, surname, date_added, date_modified, level_A, efforts)
								  VALUES(null,
								 '".$username."',sha1('".$password."'),						         
								 '".$afm."',
								 '".$name."','".$surname."', now(), now(),
								 '".$level."' , '".$efforts."'   )  ";
		// η ματαβλητη υπαρχει $mysqli στο include.php
		 $student_registration_result = mysqli_query($mysqli,  $student_registration)
		                                 or die(mysqli_error($mysqli));
										 								 							
		 mysqli_close($mysqli);

//ενα απο τα δυο block  θα εμφανιστουν   ."$username".   TO $password ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ********
		echo  "<html><head><title>δωθηκαν τα στοιχεια</title></head><body>τα σωστα δεδομενα δοθηκαν: ".$username.",
********, ".$afm." , ".$name." , ".$surname.".<a href=\"homepage.php\">θελεις να επιστρεψεις στην μητρικη σελιδα 
		 πατα εδω </a></body></html>";
				 
exit;
}


// τελικα PHP functions
function validate_password($getElementById,$msgout,$min,$max,$msgout_b) {
  if($getElementById == ""){
  return $msgout;
  } else if (strlen($getElementById) < $min){
  return  "δεν μπορειται να εισαγεται τοσο μικρο ".$msgout_b.":*****. ξαναδωστε μεγαλυτερο. πρεπει να ειναι τουλαχιστον:".$min." χαρακτηρες<br />" ;
    
  } else if (strlen($getElementById) > $max) {
  return "δεν μπορειται να εισαγεται τοσο μεγαλο ".$msgout_b.":********** .ξανδωστε μικροτερο.πρεπει να ειναι το πολυ:".$max." χαρακτηρες<br />";
  
  }else if (  
  ( !preg_match("/[a-z]/", $getElementById) ||
    !preg_match("/[A-Z]/", $getElementById) ||
    !preg_match("/[0-9]/", $getElementById)  )
&&  (!preg_match("/[α-ω]/", $getElementById) ||
     !preg_match("/[Α-Ω]/", $getElementById) ||
     !preg_match("/[0-9]/", $getElementById)  )
           )
	{
   return "O κωδικος_χρηστη πρεπει να εχει τουλαχιστον 1 απο a-z, A-Z και 0-9.
   η μπορει να εχει τουλαχιστον  1 α-ω, Α-Ω, 0-9 <br />";
  } else {
  return "";
  }
} 


function validate_email($field) {
if ($field == "") return "No Email was entered<br />";
else if (!((strpos($field, ".") > 0) &&
(strpos($field, "@") > 0)) ||
preg_match("/[^a-zA-Z0-9.@_-]/", $field))
return "The Email address is invalid<br />";
return "";
}
function fix_string($string) {
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return  ($string);
}

// htmlentities
//return htmlentities($string);  ΓΙΑ ΝΑ ΕΧΕΙ ΜΟΝΟ ΚΑΠΟΙΕΣ ΓΛΩΣΣΕΣ

function validate_string_varchar($getElementById,$msgout,$min,$max,$msgout_b){
  if($getElementById == ""){
  
  return $msgout;
  } else if (strlen($getElementById) < $min){
  return "δεν μπορειται να εισαγεται τοσο μικρο".$msgout_b.":".$getElementById.".ξαναδωστε μεγαλυτερο.πρεπει να ειναι :".$min."χαρακτηρες<br />";
  } else if (strlen($getElementById) > $max) {
  return "δεν μπορειται να εισαγεται τοσο μεγαλο".$msgout_b.":".$getElementById.".ξανδωστε μικροτερο.πρεπει να ειναι :".$max."χαρακτηρες<br />";
  } else {
  return "";
  }
 }


function validate_username($getElementById,$msgout,$min,$max,$msgout_b) {
  if($getElementById == ""){
  
  return $msgout;
  } else if (strlen($getElementById) < $min){
  return "δεν μπορειται να εισαγεται τοσο μικρο".$msgout_b.":".$getElementById.".ξαναδωστε μεγαλυτερο.πρεπει να ειναι :".$min."χαρακτηρες<br />";
  } else if (strlen($getElementById)> $max) {
  return "δεν μπορειται να εισαγεται τοσο μεγαλο".$msgout_b.":".$getElementById.".ξανδωστε μικροτερο.πρεπει να ειναι :".$max."χαρακτηρες<br />";
  } else if (preg_match("/[^a-zA-Z0-9_-]/", $getElementById)  &&  preg_match("/[^α-ωΑ-Ω0-9_-]/", $getElementById)    ){                                             
  return "μονο γραμματα, αριθμοι και τα συμβολα - , _ στο ονομα χρηστη<br />";
  } else {
  return "";
  }
}

?>	   
  