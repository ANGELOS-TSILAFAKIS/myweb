<?php

include("include.php");

includedatabase();
require('practice_javascript.php');
 ////εχω 10 πινακες αρα 10 περιπτωσεις SELECT με τα αντιστοιχα πεδια
	 // 1. ληψη του πινακα basic_student_registration
	$get_basic_student_registration = " SELECT 
                        CONCAT_WS(' ', surname, name) AS name_surname,
						name_father, name_mother, Registration_Number, half_year_insertion, Identity_Card, afm, TAX_OFFICE
					    FROM basic_student_registration
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_basic_student_registration_result = mysqli_query($mysqli,  $get_basic_student_registration)
		                                      or die(mysqli_error($mysqli));
    	
    
	/*
		1.εχουμε εναν πινακα βασικα_στοιχεια_φοιτητη = basic_student_registration
       1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.επωνυμο = surname                                       40
	   2.ονομα =  name                                           40
       3.ονομα πατερα  = name_father                             40
	   4.ονομα μητερας = name_mother                             40
	   5.αριθμος μητρωου = Registration_Number                   40
	   6.εξαμηνο εισαγωγης = half_year_insertion                 40
	   7.αριθμος δελτιου ταυτοτητας = Identity_Card              40
       8.ΑΦΜ = afm                                               40
       9.ΔΟΥ = TAX_OFFICE                                        40
       10.ημερομηνια προσθηκης = date_added                      40
	   11.ημερομηνια τροποποιησης = date_modified                40
	*/
	
	
	if (mysqli_num_rows($get_basic_student_registration_result) > 0) {
	    $block = "<p><strong>ΑΙΤΗΣΗ</strong></p> <ul> " ;
	
		while ($info_table = mysqli_fetch_array($get_basic_student_registration_result))  {
					$name_surname = stripslashes($info_table["name_surname"]);
					$name_father = stripslashes($info_table["name_father"]);
					$name_mother = stripslashes($info_table["name_mother"]);
					$Registration_Number = stripslashes($info_table["Registration_Number"]);
					$half_year_insertion = stripslashes($info_table["half_year_insertion"]);
					$Identity_Card = stripslashes($info_table["Identity_Card"]);
					$afm = stripslashes($info_table["afm"]);
					$TAX_OFFICE = stripslashes($info_table["TAX_OFFICE"]);
					
				 $block .= " 	<li>ονοματεπωνυμο:".$name_surname."</li>
				                <li>ονομα πατερα:".$name_father."</li>
				                <li>ονοματεπωνυμο:".$name_father."</li>  
				                <li>ονομα μητερας:".$name_mother."</li>
				                <li>αριθμος μητρωου:".$Registration_Number."</li>
								<li>εξαμηνο εισαγωγης:".$half_year_insertion."</li>
								<li>αριθμος δελτιου ταυτοτητας :".$Identity_Card."</li>
								<li>afm:".$afm."</li>
								<li>ΔΟΥ :".$TAX_OFFICE."</li>
				" ;   
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_basic_student_registration_result);

   
   /*
   	2.εχουμε εναν πινακα επιχειριση  =   Business
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.επωνυμια_επιχειρησης = Company_Name                     40
	   5.ημερομηνια προσθηκης = date_added                       40
	   6.ημερομηνια τροποποιησης = date_modified                 40
   
   */
   
   
   // 2. ληψη του πινακα Business
   
   	$get_Business = " SELECT Company_Name 
					    FROM Business
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_Business_result = mysqli_query($mysqli, $get_Business)
		                  or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_Business_result) > 0) {
	    $block .= '<p><strong>επιχειριση:</strong></p>  <ul>  ';
	    
		
		// επεξεργασια των δεδομενων της γραμμης
		while ($info_table = mysqli_fetch_array( $get_Business_result))  {
					$Company_Name = stripslashes($info_table["Company_Name"]);

					
				 $block .= " 	<li>επωνυμια_επιχειρησης:".$Company_Name."</li>

				" ;
												
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_Business_result);
	
	  
   /*
   	 3.εχουμε εναν πινακα  υπευθυνος_επιχειρησης = Responsible_Business  
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.υπευθυνος_επιχειρησης = Responsible_Business            40 
	   3.τηλεφωνο = phone_Responsible_Business                   40
	   4.ημερομηνια προσθηκης = date_added                       40
	   5.ημερομηνια τροποποιησης = date_modified                 40
   
   */
   
   $get_Responsible_Business = " SELECT Responsible_Business, phone_Responsible_Business
					    FROM Responsible_Business
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_Responsible_Business_result = mysqli_query($mysqli, $get_Responsible_Business)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_Responsible_Business_result) > 0) {
	    $block .= '<p><strong>επιχειριση:</strong></p>  </ul> ';
	
		while ($info_table = mysqli_fetch_array( $get_Responsible_Business_result))  {
					$Responsible_Business = stripslashes($info_table["Responsible_Business"]);
                    $phone_Responsible_Business = stripslashes($info_table["phone_Responsible_Business"]); 
					
				 $block .= " 	<li>υπευθυνος_επιχειρησης:".$Responsible_Business."</li>
				                <li>τηλεφωνο:".$phone_Responsible_Business."</li>

				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_Responsible_Business_result);
	
	/*
	
	    4.εχουμε εναν πινακα   υπευθυνος_παρακολουθησης = Responsible_monitoring
       1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.υπευθυνος_παρακολουθησης = Responsible_monitoring       40
	   3.τηλεφωνο = phone_Responsible_monitoring                 40
	   4.ημερομηνια προσθηκης = date_added                       40
	   5.ημερομηνια τροποποιησης = date_modified                 40
	*/
	
	
   $get_Responsible_monitoring = " SELECT Responsible_monitoring, phone_Responsible_monitoring
					    FROM Responsible_monitoring
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_Responsible_monitoring_result = mysqli_query($mysqli, $get_Responsible_monitoring)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_Responsible_monitoring_result) > 0) {
	    $block .= '<p><strong>υπευθυνος επιχειρησης:</strong></p>  <ul> ';
	
		while ($info_table = mysqli_fetch_array( $get_Responsible_monitoring_result))  {
					$Responsible_monitoring = stripslashes($info_table["Responsible_monitoring"]);
                    $phone_Responsible_monitoring = stripslashes($info_table["phone_Responsible_monitoring"]); 
					
				 $block .= " 	<li>υπευθυνος_παρακολουθησης:".$Responsible_monitoring."</li>
				                <li>τηλεφωνο:".$phone_Responsible_monitoring."</li>

				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_Responsible_monitoring_result);								  
									  
								
	
	/*
	5.εχουμε εναν πινακα  διευθυνση_επιχειρισης = business_address
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2. οδος = street                                          40                              
	   3. αριθμος = number                                       40
	   4.ταχ/κος κωδικας = postal_code                           40
	   5.πολη/χωριο = town_village                               40
	   6.τηλεφωνο = phone_business_address                       40
	   7.fax = fax                                               40
	   8.ηλεκτρονικο ταχυδρομειο = e-mail                        40
	   9.ημερομηνια προσθηκης = date_added                       40
	   10.ημερομηνια τροποποιησης = date_modified                40	
	 */  
	 

   $get_business_address = " SELECT street, number, postal_code,  town_village, phone_business_address, fax, e_mail
					    FROM business_address
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_business_address_result = mysqli_query($mysqli, $get_business_address)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_business_address_result) > 0) {
	    $block .= '<p><strong>διευθυνση_επιχειρισης:</strong></p>  <ul> ';
	
		while ($info_table = mysqli_fetch_array( $get_business_address_result))  {
					$street = stripslashes($info_table["street"]);
                    $number = stripslashes($info_table["number"]);
					$postal_code = stripslashes($info_table["postal_code"]);
					$town_village = stripslashes($info_table["town_village"]);
					$phone_business_address = stripslashes($info_table["phone_business_address"]);
					$fax = stripslashes($info_table["fax"]);
					$e_mail = stripslashes($info_table["e_mail"]);  
					
				 $block .= " 	<li>οδος:".$street."</li>
				                <li>αριθμος:".$number."</li>
								<li>ταχυδρομικος κωδικας:".$postal_code."</li>
								<li>πολη ή χωριο:".$town_village."</li>
								<li>τηλεφωνο:".$phone_business_address."</li>
								<li>φαξ:".$fax."</li>
								<li>ηλεκτρονικο ταχυδρομειο:".$e_mail."</li>					
				";
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_business_address_result);	
	
	
	   
	 /* 
    6.εχουμε εναν πινακα αντικειμενο επιχειρισης = object_business
	  1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	  1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	  2.αντικειμενο επιχειρισης = enterprise_object              140 --
      3.ημερομηνια προσθηκης = date_added                        40
	  4.ημερομηνια τροποποιησης = date_modified                  40
    */

   $get_object_business = " SELECT enterprise_object
					    FROM object_business
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_object_business_result = mysqli_query($mysqli, $get_object_business)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_object_business_result) > 0) {
	    $block .= '<p><strong>αντικειμενο επιχειρισης:</strong></p> <ul>   ';
	
		while ($info_table = mysqli_fetch_array( $get_object_business_result))  {
					$enterprise_object = stripslashes($info_table["enterprise_object"]); 
					
				 $block .= " 	<li>αντικειμενο επιχειρισης:".$enterprise_object."</li>

				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_object_business_result);		
	  
	  
	  /*
	7. εχουμε εναν πινακα εγκριση_πρακτικης  = adoption_practice
	 1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	 1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	 2.ημερομηνια πρακτικης = date_practice                     10  --------
	 3.αντικειμενο αποσχολησης = employment_subject             140 -----
	 4.ημερομηνια προσθηκης = date_added                        40
	 5.ημερομηνια τροποποιησης = date_modified                  40	
	 */
	 
	 
	 
	$get_adoption_practice = " SELECT date_practice, employment_subject
					    FROM adoption_practice
					    WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
    $get_adoption_practice_result = mysqli_query($mysqli, $get_adoption_practice)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_adoption_practice_result) > 0) {
	    $block .= '<p><strong>εγκριση_πρακτικης:</strong></p>  <ul> ';
	
		while ($info_table = mysqli_fetch_array( $get_adoption_practice_result))  {
					$date_practice = stripslashes($info_table["date_practice"]);
                    $employment_subject = stripslashes($info_table["employment_subject"]); 
					
				 $block .= " 	<li>ημερομηνια πρακτικης:".$date_practice."</li>
				                <li>αντικειμενο αποσχολησης:".$employment_subject."</li>

				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_adoption_practice_result);	
	 
	 
	 
	/* 
	8.εχουμε εναν πινακα  επιτροπη πρακτικης ασκησης = 	committee_practical_exercise 
	  1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	  1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	  2.αριθμος αρχειου πρακτικης =  File_Number_practice        40
	  3.κωδικος αριθμου πρακτικης = code_Number_practice         40
	  4.ημερομηνια προσθηκης = date_added                        40
	  5.ημερομηνια τροποποιησης = date_modified                  40
    */
	
    $get_committee_practical_exercise = " SELECT File_Number_practice, code_Number_practice
					                   FROM committee_practical_exercise
					                   WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
    $get_committee_practical_exercise_result = mysqli_query($mysqli, $get_committee_practical_exercise)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_committee_practical_exercise_result) > 0) {
	    $block .= '<p><strong>πρακτικης ασκησης:</strong></p>  <ul> ';
	
		while ($info_table = mysqli_fetch_array( $get_committee_practical_exercise_result))  {
					$File_Number_practice = stripslashes($info_table["File_Number_practice"]);
                    $code_Number_practice = stripslashes($info_table["code_Number_practice"]); 
					
				 $block .= " 	<li>αριθμος αρχειου πρακτικης:".$File_Number_practice."</li>
				                <li>κωδικος αριθμου πρακτικης:".$code_Number_practice."</li>

				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_committee_practical_exercise_result);
	
	
	
	 /* 
	9. εχουμε εναν πινακα περιπτωση επικοινωνιας 1 = When_contacting_1
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
       1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2. οδος = street1                                         40                              
	   3. αριθμος = number1                                      40
	   4.ταχ/κος κωδικας = postal_code1                          40
	   5.πολη/χωριο = town_village1                              40
	   6.τηλεφωνο = phone_business_address1                      40
	   7.fax = fax1                                              40
	   8.ηλεκτρονικο ταχυδρομειο = e-mail1                       40
	   9.ημερομηνια προσθηκης = date_added                       40
	   10.ημερομηνια τροποποιησης = date_modified                40	 
	 */


   $get_When_contacting_1 = " SELECT street1, number1, postal_code1,  town_village1, phone_business_address1, fax1, e_mail1
					        FROM When_contacting_1
					        WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_When_contacting_1_result = mysqli_query($mysqli, $get_When_contacting_1)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_When_contacting_1_result) > 0) {
	    $block .= '<p><strong>περιπτωση επικοινωνιας 1:</strong></p> <ul>   ';
	
		while ($info_table = mysqli_fetch_array( $get_When_contacting_1_result))  {
					$street1 = stripslashes($info_table["street1"]);
                    $number1 = stripslashes($info_table["number1"]);
					$postal_code1 = stripslashes($info_table["postal_code1"]);
					$town_village1 = stripslashes($info_table["town_village1"]);
					$phone_business_address1 = stripslashes($info_table["phone_business_address1"]);
					$fax1 = stripslashes($info_table["fax1"]);
					$e_mail1 = stripslashes($info_table["e_mail1"]);
					
				 $block .= " 	<li>οδος:".$street1."</li>
				                <li>αριθμος:".$number1."</li>
								<li>ταχυδρομικος κωδικας:".$postal_code1."</li>
								<li>πολη ή χωριο:".$town_village1."</li>
								<li>τηλεφωνο:".$phone_business_address1."</li>
								<li>φαξ:".$fax1."</li>
								<li>ηλεκτρονικο ταχυδρομειο:".$e_mail1."</li>							
				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_When_contacting_1_result);	

	 
	/*
    10.	εχουμε εναν πινακα περιπτωση επικοινωνιας 2 = When_contacting_2
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2. οδος = street2                                         40                              
	   3. αριθμος = number2                                      40
	   4.ταχ/κος κωδικας = postal_code2                          40
	   5.πολη/χωριο = town_village2                              40
	   6.τηλεφωνο = phone_business_address2                      40
	   7.fax = fax2                                              40
	   8.ηλεκτρονικο ταχυδρομειο = e-mail2                       40
	   9.ημερομηνια προσθηκης = date_added                       40
	   10.ημερομηνια τροποποιησης = date_modified                40	   
	  
	*/
	
	
   $get_When_contacting_2 = " SELECT street2, number2, postal_code2,  town_village2, phone_business_address2, fax2, e_mail2
					        FROM When_contacting_2
					        WHERE request_master_id = '".$_SESSION['$request_master_id']."' ";
   
   $get_When_contacting_2_result = mysqli_query($mysqli, $get_When_contacting_2)
		                              or die(mysqli_error($mysqli));
   
   	if (mysqli_num_rows($get_When_contacting_2_result) > 0) {
	    $block .= '<p><strong>περιπτωση επικοινωνιας 2:</strong></p>  <ul>  ';
	
		while ($info_table = mysqli_fetch_array( $get_When_contacting_2_result))  {
					$street2 = stripslashes($info_table["street2"]);
                    $number2 = stripslashes($info_table["number2"]);
					$postal_code2 = stripslashes($info_table["postal_code2"]);
					$town_village2 = stripslashes($info_table["town_village2"]);
					$phone_business_address2 = stripslashes($info_table["phone_business_address2"]);
					$fax2 = stripslashes($info_table["fax2"]);
					$e_mail2 = stripslashes($info_table["e_mail2"]);
					
				 $block .= " 	<li>οδος:".$street2."</li>
				                <li>αριθμος:".$number2."</li>
								<li>ταχυδρομικος κωδικας:".$postal_code2."</li>
								<li>πολη ή χωριο:".$town_village2."</li>
								<li>τηλεφωνο:".$phone_business_address2."</li>
								<li>φαξ:".$fax2."</li>
								<li>ηλεκτρονικο ταχυδρομειο:".$e_mail2."</li>							
				" ;
				}
				
				$block .= '</ul>';
	
    }
	mysqli_free_result($get_When_contacting_2_result);	
	
	
	
	// ΤΕΛΟΣ
	$block .= '<br/>
	            <p align="center">
	            <button onclick="myFunction()">Print this page</button>
				<script>
				function myFunction()
				{
				window.print();
				}
				</script>
            	';
	
// else	
	
mysqli_close($mysqli);	
	
?>	

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:Lang="el">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="angel" content="tsilafakis" />
  <title>πρακτικη</title>
  <link rel="stylesheet" type="text/css" href="mycss.css"/>

</head>

<body>


  <div id="container">
  

    <div id="header">

      <h1>Τ.Ε.Ι. ΠΛΗΡΟΦΟΡΙΚΗΣ</h1>
    </div>	
	 
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
	  
      <img align="center"  alt="" src="images/aitisi_egkrisis_praktikis.pdf" width="80" height="80" />
      <h1 align="center">ΑΙΤΗΣΗ</h1>
    	
<?php echo $block; ?>

</div>	<!-- main -->

<?php require('footer.php'); ?>
	