

<?php
  
	// 9 ΔΕΔΟΜΕΝΑ ΚΑΙ Ο ΧΡΟΝΟΣ ΚΑΝΤΩ ΤΩΡΑ    
$surname = $name = $name_father = $name_mother = $Registration_Number = $half_year_insertion = $Identity_Card = $afm = $TAX_OFFICE = "";
if(isset($_POST["surname"])){
   $surname = fix_string($_POST["surname"]);
}
	   
if(isset($_POST["name"])){
   $name = fix_string($_POST["name"]);
}
	   
if(isset($_POST["name_father"])){
  $name_father = fix_string($_POST["name_father"]);
}
	   
if(isset($_POST["name_mother"])){
  $name_mother = fix_string($_POST["name_mother"]);
}   

if(isset($_POST["Registration_Number"])){
  $Registration_Number = fix_string($_POST["Registration_Number"]);
} 

if(isset($_POST["half_year_insertion"])){
  $half_year_insertion = fix_string($_POST["half_year_insertion"]);
} 

if(isset($_POST["Identity_Card"])){
  $Identity_Card = fix_string($_POST["Identity_Card"]);
} 

if(isset($_POST["afm"])){
  $afm = fix_string($_POST["afm"]);
} 

if(isset($_POST["TAX_OFFICE"])){
  $TAX_OFFICE = fix_string($_POST["TAX_OFFICE"]);
}

$fail =  validate_string_varchar($surname,"το επωνυμο δεν συμπληρωθηκε <br />",3,40,"επωνυμο");
                             
$fail .=  validate_string_varchar($name,"το ονομα δεν συμπληρωθηκε <br />",3,40,"ονομα");

$fail .=  validate_string_varchar($name_father,"το ονομα πατερα δεν συμπληρωθηκε <br />",3,40,"ονομα πατερα");

$fail .=  validate_string_varchar($name_mother,"το ονομα μητερας δεν συμπληρωθηκε <br />",3,40,"ονομα μητερας");

$fail .=  validate_string_varchar($Registration_Number,"ο αριθμος μητρωου δεν συμπληρωθηκε <br />",3,40,"αριθμο μητρωου");

$fail .=  validate_string_varchar($half_year_insertion,"το εξαμηνο εισαγωγης δεν συμπληρωθηκε <br />",3,40,"εξαμηνο εισαγωγης");

$fail .=  validate_string_varchar($Identity_Card,"ο αριθμος δελτιου ταυτοτητας δεν συμπληρωθηκε <br />",3,40,"αριθμος δελτιου ταυτοτητας");

$fail .=  validate_string_varchar($afm,"το ΑΦΜ δεν συμπληρωθηκε <br /> ",3,40,"ΑΦΜ");

$fail .=  validate_string_varchar($TAX_OFFICE,"το ΔΟΥ (ΕΦΟΡΙΑ) δεν συμπληρωθηκε <br /> ",3,40,"ΔΟΥ (ΕΦΟΡΙΑ)");

/*
	2.εχουμε εναν πινακα επιχειριση  =   Business
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.επωνυμια_επιχειρησης = Company_Name                     40
	   5.ημερομηνια προσθηκης = date_added                       40
	   6.ημερομηνια τροποποιησης = date_modified                 40
	   	   
	   
	 3.εχουμε εναν πινακα  υπευθυνος_επιχειρησης = Responsible_Business  
	   1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.υπευθυνος_επιχειρησης = Responsible_Business            40 
	   3.τηλεφωνο = phone_Responsible_Business                   40
	   4.ημερομηνια προσθηκης = date_added                       40
	   5.ημερομηνια τροποποιησης = date_modified                 40
	   
	   
    4.εχουμε εναν πινακα   υπευθυνος_παρακολουθησης = Responsible_monitoring
       1.εγγραφη_φοιτητη_κλειδι = student_registration_id        10
	   1.θεμα_πρακτικης_κλειδι = subject_practice_id             10
	   2.υπευθυνος_παρακολουθησης = Responsible_monitoring       40
	   3.τηλεφωνο = phone_Responsible_monitoring                 40
	   4.ημερομηνια προσθηκης = date_added                       40
	   5.ημερομηνια τροποποιησης = date_modified                 40
*/	
// 5 δεδομενα

$Company_Name = $Responsible_Business = $phone_Responsible_Business = $Responsible_monitoring = $phone_Responsible_monitoring = ""; 

if(isset($_POST["Company_Name"])){
  $Company_Name = fix_string($_POST["Company_Name"]);
} 


if(isset($_POST["Responsible_Business"])){
  $Responsible_Business = fix_string($_POST["Responsible_Business"]);
} 

if(isset($_POST["phone_Responsible_Business"])){
  $phone_Responsible_Business = fix_string($_POST["phone_Responsible_Business"]);
}

if(isset($_POST["Responsible_monitoring"])){
  $Responsible_monitoring = fix_string($_POST["Responsible_monitoring"]);
}

if(isset($_POST["phone_Responsible_monitoring"])){
  $phone_Responsible_monitoring = fix_string($_POST["phone_Responsible_monitoring"]);
}

$fail .=  validate_string_varchar($Company_Name,"η επωνυμια επιχειρισης δεν συμπληρωθηκε <br />",3,40,"επωνυμια επιχειρισης");

$fail .=  validate_string_varchar($Responsible_Business,"ο υπευθυνος επιχειρισης δεν συμπληρωθηκε <br />",3,40,"υπευθυνος επιχειρισης");

$fail .=  validate_string_varchar($phone_Responsible_Business,"το τηλεφωνο του υπευθυνου της επιχειρισης δεν συμπληρωθηκε <br />",3,40,"τηλεφωνο του υπευθυνου της επιχειρισης");

$fail .=  validate_string_varchar($Responsible_monitoring,"ο υπευθυνος παρακολουθησης  δεν συμπληρωθηκε <br />",3,40,"υπευθυνος παρακολουθησης");

$fail .=  validate_string_varchar($phone_Responsible_monitoring,"το τηλεφωνο του υπευθυνου παρακολουθησης δεν συμπληρωθηκε <br />",3,40,"τηλεφωνο του υπευθυνου παρακολουθησης");

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


    6.εχουμε εναν πινακα αντικειμενο επιχειρισης = object_business
	  1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	  1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	  2.αντικειμενο επιχειρισης = enterprise_object              140 --
      3.ημερομηνια προσθηκης = date_added                        40
	  4.ημερομηνια τροποποιησης = date_modified                  40	 

*/
// 8 δεδομενα

$street = $number = $postal_code = $town_village = $phone_business_address = $fax = $e_mail = $enterprise_object = "";

if(isset($_POST["street"])){
  $street = fix_string($_POST["street"]);
}

if(isset($_POST["number"])){
  $number = fix_string($_POST["number"]);
}

if(isset($_POST["postal_code"])){
  $postal_code = fix_string($_POST["postal_code"]);
}

if(isset($_POST["town_village"])){
  $town_village = fix_string($_POST["town_village"]);
}

if(isset($_POST["phone_business_address"])){
  $phone_business_address = fix_string($_POST["phone_business_address"]);
}

if(isset($_POST["fax"])){
  $fax = fix_string($_POST["fax"]);
}

if(isset($_POST["e_mail"])){
  $e_mail = fix_string($_POST["e_mail"]);
}

if(isset($_POST["enterprise_object"])){
  $enterprise_object = fix_string($_POST["enterprise_object"]);
}

$fail .=  validate_string_varchar($street,"η οδος της επιχειρισης δεν συμπληρωθηκε <br />",1,40,"οδος της επιχειρισης");       // μπορει να ειναι ενας αριθμος);

$fail .=  validate_string_varchar($number,"ο αριθμος της οδου της επιχειρισης δεν συμπληρωθηκε <br />",1,40,"αριθμος της οδου της επιχειρισης");

$fail .=  validate_string_varchar($postal_code,"ο ταχυδρομικος κωδικας της επιχειρισης δεν συμπληρωθηκε <br />",3,40,"ταχυδρομικος κωδικας της επιχειρισης");

$fail .=  validate_string_varchar($town_village,"η πολη ή το χωριο ,που ανηκει η επιχειριση, δεν συμπληρωθηκε <br />",3,40,"πολη ή το χωριο ,που ανηκει η επιχειριση");

$fail .=  validate_string_varchar($phone_business_address,"το τηλεφωνο της επιχειρισης δεν συμπληρωθηκε <br />",3,40,"τηλεφωνο της επιχειρισης");

$fail .=  validate_string_varchar($fax,"το φαξ της επιχειρισης δεν συμπληρωθηκε <br />",3,40,"φαξ της επιχειρισης");

$fail .=  validate_string_varchar($e_mail,"το ηλεκτρονικο ταχυδρομειο(e-mail) της επιχειρισης δεν συμπληρωθηκε <br />",8,40,"ηλεκτρονικο ταχυδρομειο(e-mail) της επιχειρισης");

$fail .= validate_email($e_mail);                             //........................
$fail .=  validate_string_varchar($enterprise_object,"το αντικειμενο της επιχειρισης δεν συμπληρωθηκε <br />",40,140,"αντικειμενο της επιχειρισης");

/*
	7. εχουμε εναν πινακα εγκριση_πρακτικης  = adoption_practice
	 1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	 1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	 2.ημερομηνια πρακτικης = date_practice                     40                      // date
	 3.αντικειμενο αποσχολησης = employment_subject             140 -----
	 4.ημερομηνια προσθηκης = date_added                        40
	 5.ημερομηνια τροποποιησης = date_modified                  40	
	 
	  
	8.εχουμε εναν πινακα  επιτροπη πρακτικης ασκησης = 	committee_practical_exercise 
	  1.εγγραφη_φοιτητη_κλειδι = student_registration_id         10
	  1.θεμα_πρακτικης_κλειδι = subject_practice_id              10
	  2.αριθμος αρχειου πρακτικης =  File_Number_practice        40
	  3.κωδικος αριθμου πρακτικης = code_Number_practice         40
	  4.ημερομηνια προσθηκης = date_added                        40
	  5.ημερομηνια τροποποιησης = date_modified                  40

*/
// 4 δεδομενα και ο χρονος

//ΧΡΟΝΟΣ

$date_practice = "";

if(isset($_POST["date_practice"])){
  $date_practice = fix_string($_POST["date_practice"]);

}

//οκ
$fail .=  validate_string_varchar($date_practice,"η ημερομηνια πρακτικης δεν συμπληρωθηκε <br />",10,12,"ημερομηνια πρακτικης");


$employment_subject = $File_Number_practice = $code_Number_practice = "";

if(isset($_POST["employment_subject"])){
  $employment_subject = fix_string($_POST["employment_subject"]);
}

if(isset($_POST["File_Number_practice"])){
  $File_Number_practice = fix_string($_POST["File_Number_practice"]);
}

if(isset($_POST["code_Number_practice"])){
  $code_Number_practice = fix_string($_POST["code_Number_practice"]);
}


$fail .=  validate_string_varchar($employment_subject,"το αντικειμενο αποσχολησης δεν συμπληρωθηκε <br />",40,140,"αντικειμενο αποσχολησης");

$fail .=  validate_string_varchar($File_Number_practice,"ο αριθμος αρχειου πρακτικης δεν συμπληρωθηκε <br />",1,40,"αριθμος αρχειου πρακτικης");

$fail .=  validate_string_varchar($code_Number_practice,"ο κωδικος αριθμου πρακτικης δεν συμπληρωθηκε <br />",1,40,"κωδικος αριθμου πρακτικης");


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
// 7 δεδομενα 

$street1 = $number1 = $postal_code1 = $town_village1 = $phone_business_address1 = $fax1 = $e_mail1 = "";

if(isset($_POST["street1"])){
  $street1 = fix_string($_POST["street1"]);
}

if(isset($_POST["number1"])){
  $number1 = fix_string($_POST["number1"]);
}

if(isset($_POST["postal_code1"])){
  $postal_code1 = fix_string($_POST["postal_code1"]);
}

if(isset($_POST["town_village1"])){
  $town_village1 = fix_string($_POST["town_village1"]);
}

if(isset($_POST["phone_business_address1"])){
  $phone_business_address1 = fix_string($_POST["phone_business_address1"]);
}

if(isset($_POST["fax1"])){
  $fax1 = fix_string($_POST["fax1"]);
}

if(isset($_POST["e_mail1"])){
  $e_mail1 = fix_string($_POST["e_mail1"]);
}

$fail .=  validate_string_varchar($street1,"η οδος του φοιτητη δεν συμπληρωθηκε <br />",1,40,"οδος του φοιτητη");

$fail .=  validate_string_varchar($number1,"ο αριθμος της οδου του φοιτητη δεν συμπληρωθηκε <br />",1,40,"αριθμος της οδου του φοιτητη");

$fail .=  validate_string_varchar($postal_code1,"ο ταχυδρομικος κωδικας του φοιτητη δεν συμπληρωθηκε <br />",3,40,"ταχυδρομικος κωδικας του φοιτητη");
 
$fail .=  validate_string_varchar($town_village1,"η πολη ή το χωριο ,που μενει ο φοιτητης, δεν συμπληρωθηκε <br />",3,40,"πολη ή το χωριο ,που μενει ο φοιτητης");

$fail .=  validate_string_varchar($phone_business_address1,"το τηλεφωνο του φοιτητη δεν συμπληρωθηκε <br />",3,40,"τηλεφωνο του φοιτητη");

$fail .=  validate_string_varchar($fax1,"το φαξ του φοιτητη δεν συμπληρωθηκε <br />",3,40,"φαξ του φοιτητη ");

$fail .=  validate_string_varchar($e_mail1,"η ηλεκτρονικη διευθυνση(e-mail) του φοιτητη δεν συμπληρωθηκε <br />",8,40,"ηλεκτρονικη διευθυνση(e-mail) του φοιτητη");

$fail .= validate_email($e_mail1);

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

//7 ΔΕΔΟΜΕΝΑ

$street2 = $number2 = $postal_code2 = $town_village2 = $phone_business_address2 = $fax2 = $e_mail2 = "";

if(isset($_POST["street2"])){
  $street2 = fix_string($_POST["street2"]);
}

if(isset($_POST["number2"])){
  $number2 = fix_string($_POST["number2"]);
}

if(isset($_POST["postal_code2"])){
  $postal_code2 = fix_string($_POST["postal_code2"]);
}

if(isset($_POST["town_village2"])){
  $town_village2 = fix_string($_POST["town_village2"]);
}

if(isset($_POST["phone_business_address2"])){
  $phone_business_address2 = fix_string($_POST["phone_business_address2"]);
}

if(isset($_POST["fax2"])){
  $fax2 = fix_string($_POST["fax2"]);
}

if(isset($_POST["e_mail2"])){
  $e_mail2 = fix_string($_POST["e_mail2"]);
}

$fail .=  validate_string_varchar($street2,"η οδος του φοιτητη δεν συμπληρωθηκε <br />",1,40,"οδος του φοιτητη");

$fail .=  validate_string_varchar($number2,"ο αριθμος της οδου του φοιτητη δεν συμπληρωθηκε <br />",1,40,"αριθμος της οδου του φοιτητη");

$fail .=  validate_string_varchar($postal_code2,"ο ταχυδρομικος κωδικας του φοιτητη δεν συμπληρωθηκε <br />",3,40,"ταχυδρομικος κωδικας του φοιτητη");

$fail .=  validate_string_varchar($town_village2,"η πολη ή το χωριο ,που μενει ο φοιτητης, δεν συμπληρωθηκε <br />",3,40,"πολη ή το χωριο ,που μενει ο φοιτητης");
 
$fail .=  validate_string_varchar($phone_business_address2,"το τηλεφωνο του φοιτητη δεν συμπληρωθηκε <br />",3,40,"τηλεφωνο του φοιτητη");
 
$fail .=  validate_string_varchar($fax2,"το φαξ του φοιτητη δεν συμπληρωθηκε <br />",3,40,"φαξ του φοιτητη ");

$fail .=  validate_string_varchar($e_mail2,"η ηλεκτρονικη διευθυνση(e-mail) του φοιτητη δεν συμπληρωθηκε <br />",8,40,"ηλεκτρονικη διευθυνση(e-mail) του φοιτητη");

$fail .= validate_email($e_mail2);

//.....................................................................................................

if ($fail == "") {

// εδω ειναι που εισαγω τα δεδομενα στην βαση δεδομενων

        includedatabase();			
		
         //εχω 10 πινακες αρα 10 if με τα αντιστοιχα πεδια
		 //1. δημιουργια του πινακα basic_student_registration
		 		 
		 $sql_subject_student = "SELECT student_registration_id
								 FROM student_registration
								 WHERE username = '".$_SESSION['username']."'  
		 
		 
		 ";
         $sql_subject_student_result = mysqli_query($mysqli, $sql_subject_student) 
                   or die(mysqli_error($mysqli));
		 
		 if (mysqli_num_rows($sql_subject_student_result) == 1) {

			//if authorized, get the values of f_name l_name
			while ($info = mysqli_fetch_array($sql_subject_student_result)) {
			    
				$student_registration_id = stripslashes($info['student_registration_id']);
				
	        }

		}
		//εδω εχω ενα $_SESSION
		$subject_meet_practice_id = $_SESSION["subject_meet_practice_id"];
				

		 		 		 
		 $basic_student_registration = "INSERT INTO basic_student_registration (request_master_id,
		                          surname, name, name_father, name_mother, Registration_Number,  
								  half_year_insertion, Identity_Card,  afm,   TAX_OFFICE,                                         
								  date_added, date_modified, student_registration_id, subject_meet_practice_id )
								  VALUES(null,
								 '".$surname."','".$name."','".$name_father."',
								 '".$name_mother."','".$Registration_Number."',
								 '".$half_year_insertion."','".$Identity_Card."', 
								 '".$afm."','".$TAX_OFFICE."', 
								 now(), now() ,
								 '".$student_registration_id."',  '".$subject_meet_practice_id."' )     ";
		// η ματαβλητη υπαρχει $mysqli στο include.php
		 $basic_student_registration_result = mysqli_query($mysqli,  $basic_student_registration)
		                                 or die(mysqli_error($mysqli));
        
        
		//ληψη της  $request_master_id για χρηση σε αλλους πινακες και για σχετιζονται οι πινακες οι παρακατω με τον επανω ok.
		
		$request_master_id = mysqli_insert_id($mysqli);
		
		
		 
		 //2. δημιουργια του πινακα επιχειριση  =   Business
		

		 $Business = "INSERT INTO Business(request_id,request_master_id,
		                          Company_Name, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$Company_Name."', now(), now())";
		// η ματαβλητη υπαρχει $mysqli στο include.php
		 $Business_result = mysqli_query($mysqli,  $Business)
		                                 or die(mysqli_error($mysqli));
        

		
				
		//3. δημιουργια του πινακα υπευθυνος_επιχειρησης = Responsible_Business
		

		 $Responsible_Business = "INSERT INTO Responsible_Business(request_id,request_master_id,
		                          Responsible_Business, phone_Responsible_Business, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$Responsible_Business."', '".$phone_Responsible_Business."', now(), now())";
		
		 $Responsible_Business_result = mysqli_query($mysqli,  $Responsible_Business)
		                                or die(mysqli_error($mysqli));
        
		
		
		
		//4. δημιουργια του πινακα υπευθυνος_επιχειρησης = Responsible_monitoring
		

		 $Responsible_monitoring = "INSERT INTO Responsible_monitoring(request_id,request_master_id,
		                          Responsible_monitoring, phone_Responsible_monitoring, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$Responsible_monitoring."', '".$phone_Responsible_monitoring."', now(), now())";
		
		 $Responsible_monitoring_result = mysqli_query($mysqli,  $Responsible_monitoring)
		                                 or die(mysqli_error($mysqli));
        
		

	    //5. δημιουργια του πινακα διευθυνση_επιχειρισης = business_address  
		//ΠΡΕΠΕΙ να εχει τηλεφωνο η φαξ ή ηλεκτρονικο ταχυδρομιο για επικοινωνια
		if (($_POST["street"]) &&  ($_POST["number"]) || 
		($_POST["postal_code"]) &&  ($_POST["town_village"]) &&(  ($_POST["phone_business_address"]) ||  
		($_POST["fax"]) ||  ($_POST["e-mail"]) ) ){

		 $business_address = "INSERT INTO business_address(request_id,request_master_id,
		                          street, number, postal_code, town_village, phone_business_address,  
								  fax, e_mail, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$street."','".$number."','".$postal_code."',
								 '".$town_village."','".$phone_business_address."',
								 '".$fax."','".$e_mail."', now(), now())";
		
		 $business_address_result = mysqli_query($mysqli,  $business_address)
		                                 or die(mysqli_error($mysqli));
        }
				  
		
		//6. δημιουργια του πινακα αντικειμενο επιχειρισης = object_business

		 $object_business = "INSERT INTO object_business(request_id,request_master_id,
		                          enterprise_object, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$enterprise_object."', now(), now())";
		
		 $object_business_result = mysqli_query($mysqli,  $object_business)
		                             or die(mysqli_error($mysqli));
        
				       		
		//7. δημιουργια του πινακα αντικειμενο επιχειρισης = adoption_practice.
		// να δουμε εαν ειναι εγκυρη ημερομηνια 
	//	if( !(checkdate($_POST["date_practice"])) ){
	//     die(error 'date_practice');// εαν λαθος ημερομηνια   εκτυπωσε λαθος
	//	}


		 $adoption_practice = "INSERT INTO adoption_practice(request_id,request_master_id,
		                          date_practice, employment_subject, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$date_practice."', '".$employment_subject."', now(), now())";
		
		 $adoption_practice_result = mysqli_query($mysqli,  $adoption_practice)
		                                or die(mysqli_error($mysqli));
        
							  
		//8. δημιουργια του πινακα επιτροπη πρακτικης ασκησης = committee_practical_exercise
		
		 $committee_practical_exercise = "INSERT INTO committee_practical_exercise(request_id,request_master_id,
		                          File_Number_practice, code_Number_practice, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$File_Number_practice."', '".$code_Number_practice."', now(), now())";
		
		 $committee_practical_exercise_result = mysqli_query($mysqli,  $committee_practical_exercise)
		                                or die(mysqli_error($mysqli));
        					   	   
	    //9. δημιουργια του πινακα περιπτωση επικοινωνιας 1 = When_contacting_1
		//ΠΡΕΠΕΙ να εχει τηλεφωνο η φαξ ή ηλεκτρονικο ταχυδρομιο για επικοινωνια
		if (($_POST["street1"]) &&  ($_POST["number1"]) && 
		($_POST["postal_code1"]) &&  ($_POST["town_village1"]) &&(  ($_POST["phone_business_address1"]) || 
		($_POST["fax1"]) ||  ($_POST["e-mail1"])  )  ) {

		 $When_contacting_1 = "INSERT INTO When_contacting_1(request_id,request_master_id,
		                          street1, number1, postal_code1, town_village1, phone_business_address1,  
								  fax1, e_mail1, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$street1."','".$number1."','".$postal_code1."',
								 '".$town_village1."','".$phone_business_address1."',
								 '".$fax1."','".$e_mail1."', now(), now())";
		
		 $When_contacting_1_result = mysqli_query($mysqli,  $When_contacting_1)
		                                 or die(mysqli_error($mysqli));
        }
		
		
		
		//10. δημιουργια του πινακα περιπτωση επικοινωνιας 2 = When_contacting_2
		//ΠΡΕΠΕΙ να εχει τηλεφωνο η φαξ ή ηλεκτρονικο ταχυδρομιο για επικοινωνια
		if (($_POST["street2"]) &&  ($_POST["number2"]) && 
		($_POST["postal_code2"]) &&  ($_POST["town_village2"]) &&(  ($_POST["phone_business_address2"]) || 
		($_POST["fax2"]) ||  ($_POST["e-mail2"])  )  ) {

		 $When_contacting_2 = "INSERT INTO When_contacting_2(request_id,request_master_id,
		                          street2, number2, postal_code2, town_village2, phone_business_address2,  
								  fax2, e_mail2, date_added, date_modified)
								  VALUES(null,'".$request_master_id."',
								 '".$street2."','".$number2."','".$postal_code2."',
								 '".$town_village2."','".$phone_business_address2."',
								 '".$fax2."','".$e_mail2."', now(), now())";
		
		 $When_contacting_2_result = mysqli_query($mysqli,  $When_contacting_2)
		                                 or die(mysqli_error($mysqli));
        }
		

		 mysqli_close($mysqli);
		 
		 
		 
		// για την εκτυπωση 
		 $_SESSION['$request_master_id'] = $request_master_id;
		 
		         //ενα απο τα δυο block  θα εμφανιστουν   ."$username".
		echo  "<html><head><title>δωθηκαν τα στοιχεια</title></head><body>η εγραφη ολοκληρωθηκε: ".$_SESSION["username"].".
		<a href=\"homepage.php\">θελεις να επιστρεψεις στην μητρικη σελιδα 
		 πατα εδω </a>   
		 <a href=\"print_request.php\">θελεις να εκτυπωσεις
		 πατα εδω </a>
		 
		 </body></html>";
		 

		 		 
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
	   