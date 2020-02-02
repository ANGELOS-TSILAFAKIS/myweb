

<?php
require('include.php');
includedatabase();

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
//συγκεντρωση των θεματων 
$all_subject_profesor = "SELECT subject_meet_practice_id,  e_mail, title, text, 
                             subject_practice_create_time, subject_practice_delete_time
							 FROM subject_profesor
							 ORDER BY subject_practice_create_time DESC";
							 
$all_subject_profesor_result  = mysqli_query($mysqli, $all_subject_profesor)
                              or die(mysqli_error($mysqli));
	
if (mysqli_num_rows($all_subject_profesor_result) < 1) {
    //δεν υπαρχουν θεματα
    $message = "<h3>δεν εχουμε συνεδριασεις επιτροπης πρακτικης ασκησης</h3>";
	
}else {
    //εμφανιση θεματων
   // εδω  θα ειναι και η επιλογη της πρακτικης.
	 //θα ειναι η πρωτη κεντρικη στηλη 
	 //,που θα αναφερει για την καθε στηλη την αρμοδιοτητα της
	$message = '
     <table cellpading="3" cellspacing="1" border="1">
     <tr>
       <th>αυξουσα αριθμος ή το κλειδι</th>	 
	   <th>ηλεκτρονικο ταχυδρομειο</th>
	   <th>τιτλος συνεδριας</th>
	   <th>περιγραφη της συνεδριας απο τον καθηγητη</th>
	   <th>χρονικη εναρξη της πρακτικης</th>
	   <th>χρονικη ληξη της πρακτικης</th>
	   <th>αριθμος φοιτητων που δηλωσαν την συνεδρια</th>
	   <th>επιλογη</th>
	 </tr> ';
	 	 
	 // για οσο υπαρχουν εγγραφες στο αποτελεσμα του προηγουμενου ερωτηματος κανε τα εξης  
	 while ($subject_info = mysqli_fetch_array($all_subject_profesor_result)) {
	        $subject_meet_practice_id = $subject_info['subject_meet_practice_id'];
			$e_mail = stripslashes($subject_info['e_mail']);
			$title = stripslashes($subject_info['title']);
			$text = stripslashes($subject_info['text']);
			$subject_practice_create_time = $subject_info['subject_practice_create_time'];
			$subject_practice_delete_time = $subject_info['subject_practice_delete_time'];
              
			         //= $subject_practice_delete_time		
//παιρνω την τιμη μιας χρονικης στιγμης
$time_now = strtotime("now");	
		if ( ($time_now > (strtotime("$subject_practice_delete_time")) &&  ($_SESSION['level'] == 1) )
        ||  ($time_now < (strtotime("$subject_practice_create_time")) &&  ($_SESSION['level'] == 1) )  )
		{//φοιτητης στο χρονικο διαστημα εγγραφης
			// ΕΔΩ ΑΠΟΘΗΚΕΥΩ ΤΟ $_SESSION['subject_practice_id']='".$subject_practice_id."' ΓΙΑ ΤΗΝ ΠΡΑΚΤΙΚΗ
			//$select = '" <a href = \"practice_html.php\"?$_SESSION[\"subject_practice_id\"]='".$subject_practice_id."' .............................................................
				
			$select = '<p>δεν μπορεις να κανεις αιτηση</p>';
			
			
		} else {  
		
		// χρειαζεται γαι το ξενο κλειδι
		    $_SESSION['subject_meet_practice_id'] = $subject_meet_practice_id; 
		    $select = '<p><a href="practice_html.php"> μπορεις να κανεις αιτηση</a></p>';
		}
		 
	    if($_SESSION['level'] == 2 ){
			$select = "<p> επιλογη καθηγητη </p>";  // θα μπορουσε διαγραφη και επιπλεων κωδικα αλλα αστο
		}
			
			
			//ευρεση του πληθους των αρθρων   ΑΠΟ ΕΔΩ ΘΑ ΒΡΩ ΚΑΙ ΤΟ ΠΛΗΘΟΣ ΤΩΝ ΔΗΛΩΣΕΩΝ ΤΩΝ ΦΟΙΤΗΤΩΝ
			//-------ΑΥΤΟ ΘΑ ΒΟΗΘΑΕΙ ΚΑΙ ΓΙΑ ΤΑ ΣΤΑΤΙΣΤΙΚΑ --------
			//συγκεντρωση_num__sql_basic_student_registration_sql   O ΑΡΙΘΜΟΣ ΤΩΝ ΠΡΑΚΤΙΚΩΝ
			$num__basic_student_registration = "SELECT COUNT(student_registration_id) AS count_student_registration_id
			                               FROM basic_student_registration
										   WHERE subject_meet_practice_id = '".$subject_meet_practice_id."' ";
										 
			$num__basic_student_registration_result  = mysqli_query($mysqli, $num__basic_student_registration)
                                                      or die(mysqli_error($mysqli));							 
										 
			//
            while ($all_subject_info = mysqli_fetch_array($num__basic_student_registration_result)) {
                   $num_all_subject_info = $all_subject_info['count_student_registration_id'];     // αριθμος των φοιτητων που δηλωσαν την πρακτικη
             }
			
			// στο select αναλογως με πανω
								$message .= "
			<tr>
			  <td>  <strong>".$subject_meet_practice_id."</strong> </td>
			  <td>  <strong>".$e_mail."  </strong></td>
			  <td>  <strong>".$title."  </strong></td>
			  <td>  <strong>".$text." </strong></td>
			  <td>  <strong>".$subject_practice_create_time." </strong></td>
			  <td>  <strong>".$subject_practice_delete_time." </strong></td>
			  <td>  <strong>".$num_all_subject_info."   </strong></td>
			  
			  <td><strong>  ".$select."  </strong></td>
			</tr>  ";
															
	}

	// απελευθερωση αποτελεσματων
	mysqli_free_result($all_subject_profesor_result);
	mysqli_free_result($num__basic_student_registration_result);
	
	//κλεισιμο πινακα
	$message .= '</table>';	
}
?>


<?php require('is_logged_in.php'); ?>	 
<?php require('header.php'); ?>	 
<?php echo_msg(); ?>	
  
    <div id="leftsidebar">
      <ul class="menu">
         <li><a href="homepage.php">θελεις να επιστρεψεις στην μητρικη σελιδα 
		 πατα εδω </a>  </p></li>
         <li>ΚΑΛΩΣ ΗΡΘΕΣ <?php echo "".$_SESSION["username"].""; ?></li>
		 

	     <?php if ( isset($_SESSION['username']) ) { ?>
	      <li><a href="logout.php">logout</a></li>
	     <?php } ?>
      </ul>
    </div>
		 	  
    <div id="main">
      <div id="formContainer">
    <form  id="userdata" name="userdata" action="".$_SERVER{["PHP_SELF"]."" method="POST">

    <?php echo $message; ?>
    
   </form>

    </div>
	
</div>
  
<?php require('footer.php'); ?>
			            						 