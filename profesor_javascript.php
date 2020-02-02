
<?php 
 /*
	
	  εχουμε μια βαση δεδομενων πρακτικη = practice
	1.εχουμε εναν πινακα θεμματα καθηγητων  = subject_profesor
	   1.θεμα πρακτικης κλειδι = subject_practice_id                      10
	   2.ηλεκτρονικο ταχυδρομειο = e-mail                                 40
	   3.τιτλος = title                                                   40
	   4.κειμενο = text                                                   140  περιγραφη του τιτλου του θεματος
	   5.θεμα πρακτικης χρονικη εναρξη = subject_practice_create_time     40
	   6.θεμα πρακτικης χρονικη ληξη = subject_practice_delete_time       40
	   7.ημερομηνια προσθηκης = date_added                                40
	   9.ημερομηνια τροποποιησης = date_modified                          40
		
	*/	
//5 δεδομενα

$e_mail = $title = $text = $subject_practice_create_time = $subject_practice_delete_time = "";

	
if(isset($_POST["e_mail"])){
  $e_mail = fix_string($_POST["e_mail"]);
}

if(isset($_POST["title"])){
  $title = fix_string($_POST["title"]);
}

if(isset($_POST["text"])){
  $text = fix_string($_POST["text"]);
}

if(isset($_POST["subject_practice_create_time"])){
  $subject_practice_create_time = fix_string($_POST["subject_practice_create_time"]);
}

if(isset($_POST["subject_practice_delete_time"])){
  $subject_practice_delete_time = fix_string($_POST["subject_practice_delete_time"]);
}



$fail  =  validate_string_varchar($e_mail,"το ηλεκτρονικο ταχυδρομειο(e-mail) της επιχειρισης δεν συμπληρωθηκε <br />",8,40,"ηλεκτρονικο ταχυδρομειο(e-mail) της επιχειρισης");
$fail .= validate_email($e_mail);



$fail .=  validate_string_varchar($title,"ο τιτλος δεν συμπληρωθηκε <br />",3,40,"τιτλος");

$fail .=  validate_string_varchar($text,"το κειμενο δεν συμπληρωθηκε <br />",40,140,"κειμενο");   //..................
	
// ΤΡΟΠΟΣ ΓΙΑ ΧΡΟΝΟ

if(isset($_POST["subject_practice_create_time"])){
  $subject_practice_create_time = fix_string($_POST["subject_practice_create_time"]);

}

//οκ
$fail .=  validate_string_varchar($subject_practice_create_time,"η χρονικη εναρξη του θεματος της πρακτικης δεν συμπληρωθηκε <br />",10,10,"χρονικη εναρξη του θεματος της πρακτικης");

if(isset($_POST["subject_practice_delete_time"])){
  $subject_practice_delete_time = fix_string($_POST["subject_practice_delete_time"]);

}

//οκ
$fail .=  validate_string_varchar($subject_practice_delete_time,"η χρονικη ληξη του θεματος της πρακτικης δεν συμπληρωθηκε <br />",10,10,"χρονικη ληξη του θεματος της πρακτικης");



if ($fail == "") {

   includedatabase();
     
 
 // εδω ειναι το SELECT
 
 
 		 $sql = "SELECT student_registration_id
         FROM student_registration
		 WHERE username = '".$_SESSION['username']."' 
		 
		 ";
         $result = mysqli_query($mysqli, $sql) 
                   or die(mysqli_error($mysqli));
		 
		 if (mysqli_num_rows($result) == 1) {

			//if authorized, get the values of f_name l_name
			while ($info = mysqli_fetch_array($result)) {
				$student_registration_id = stripslashes($info['student_registration_id']);
	    }
		
        $subject_profesor = "INSERT INTO subject_profesor (subject_meet_practice_id,e_mail,title,text,subject_practice_create_time,
                    subject_practice_delete_time, date_added, date_modified,student_registration_id) 
                    VALUES( null,
					'".$_POST["e_mail"]."', '".$_POST["title"]."', '".$_POST["text"]."',
					

					
					'".$_POST["subject_practice_create_time"]."', 
					'".$_POST["subject_practice_delete_time"]."', now(),  now(),
					'".$student_registration_id."')";
 
    $subject_profesor_result = mysqli_query($mysqli, $subject_profesor)
                              or die(mysqli_error($mysqli));
							  
							   
    mysqli_close($mysqli);
		
	        //ενα απο τα δυο block  θα εμφανιστουν   ."$username".
		echo  "<html><head><title>δωθηκαν τα στοιχεια</title></head><body>η πρακτικη εχει καταχωρηθει: ".$e_mail.",
".$title.", ".$text.", ".$subject_practice_create_time.", ".$subject_practice_delete_time." .
<a href=\"profesor_html.php\">θελεις να επιστρεψεις στην προηγουμενη  ιστοσελιδα 
		 πατα εδω </a></body></html>";
exit;

}
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
if ($field == "") return "";
else if (!((strpos($field, ".") > 0) &&
(strpos($field, "@") > 0)) ||
preg_match("/[^a-zA-Z0-9.@_-]/", $field))
return "το ηλεκτρονικο ταχυδρομειο ειναι ακυρο<br />";
return "";
}
function fix_string($string) {
if (get_magic_quotes_gpc()) $string = stripslashes($string);
return  ($string);
}


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
