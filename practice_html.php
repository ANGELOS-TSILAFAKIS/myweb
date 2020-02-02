<!-- η ιστοσελιδα που ειναι οταν παταμε για την εγγραφη φοιτητη. 
περιεχει την γλώσσα σήμανσης υπερκείμενου html -->

<?php

//εδω ο φοιτητης κανει την αιτηση της πρακτικης του και εχει την δυνατοτητα να κανει μονο μια. 

require('include.php');

require('practice_javascript.php');

$block = '
<table id="userdata" name="userdata" width="100%" cellpadding="3" cellspacing="2" border="2"    class="signup" >
    ';
	
 if ($_POST) {
 
   $block .= '  
  
  
  <th colspan="2" align="center">δωσε τα διωρθωμενα στοιχεια που παρουσιαζονται</th>

<tr><td colspan="2"><strong>τα παρακατω λαθος στοιχεια ειναι τα εξης:<br />
στην φορμα σου <strong><p><font color=red size=3><i>"'.$fail.'"</i></font></p>
</td></tr>


    ';
 } 
  
// προσοχη !!! βαζω '" "'  στα block για να μην γινεται μπερδεμα .το '" ειναι ανοιγω παρενθεση . το "' ειναι κλεινω παρενθεση .
 $block .= '
 
  </table>
 
<form  id="userdata" name="userdata" action="'.$_SERVER["PHP_SELF"].'" method="POST" >
		
<table width="100%" cellpadding="3" cellspacing="2" border="2">
		  	  	  
	    <tr>
          <td width="25%">&nbsp;</td>
          <td><strong>Τα πεδία με έντονη γραφή είναι υποχρεωτικά!</strong></td>
        </tr>
	  
	    <tr>
          <td class="right" width="20%"><strong>επωνυμο</strong>:</td>
          <td>
           <input type="text" name="surname" id="surname" size="25" maxlength="40" value="'.$surname.'" />
          </td>
        </tr>
	  
        <tr>
          <td class="right" width="20%"><strong>ονομα</strong>:</td>
          <td>
            <input type="text" name="name" id="name" size="25" maxlength="40" value="'.$name.'" />
          </td>
        </tr>
		
        <tr>
           <td class="right"><strong>ονομα πατερα</strong>:</td>
             <td>
              <input type="text" name="name_father" id="name_father" size="25" maxlength="40" value="'.$name_father.'" />
            </td>
        </tr>
		
        <tr>
           <td class="right"><strong>ονομα μητερας</strong>:</td>
           <td>
             <input type="text" name="name_mother" id="name_mother" size="25" maxlength="40" value="'.$name_mother.'" />
            </td>
        </tr>
		
        <tr>
            <td class="right"><strong>αριθμος μητρωου</strong>:</td>
            <td>
              <input type="text" name="Registration_Number"  id="Registration_Number" size="25" maxlength="40" value="'.$Registration_Number.'" />
            </td>
        </tr>
		
	    <tr>
           <td class="right"><strong>εξαμηνο εισαγωγης</strong>:</td>
           <td>
             <input type="text" name="half_year_insertion"  id="half_year_insertion" size="25" maxlength="40" value="'.$half_year_insertion.'" />
           </td>
        </tr>
		
	  	<tr>
           <td class="right"><strong>αριθμος δελτιου ταυτοτητας</strong>:</td>
           <td>
             <input type="text" name="Identity_Card"  id="Identity_Card" size="25" maxlength="40" value="'.$Identity_Card.'" />
           </td>
        </tr>
		
	    <tr>
          <td class="right"><strong>ΑΦΜ</strong>:</td>
          <td>
            <input type="text" name="afm"  id="afm" size="25" maxlength="40" value="'.$afm.'" />
          </td>
         </tr>
		 
	    <tr>
           <td class="right"><strong>ΔΟΥ</strong>:</td>
         <td>
           <input type="text" name="TAX_OFFICE"  id="TAX_OFFICE" size="25" maxlength="40" value="'.$TAX_OFFICE.'" />
         </td>
        </tr>	
	  
       <!-------                    ---επιχειριση--              -->
      <tr>
        <td  colspan="2" ><strong>ΕΠΩΝΥΜΙΑ ΕΠΙΧΕΙΡΗΣΗΣ ή ΥΠΗΡΕΣΙΑΣ</strong>:</td>
       </tr>  
		

		
		<tr>
		<td colspan="2">
          <textarea  name="Company_Name"  id="Company_Name" rows="2" cols="40" value="'.$Company_Name.'" ></textarea>
        </td>
      </tr>
	  	  
		  <tr>
        <td colspan="2"><strong>ΥΠΕΥΘΥΝΟΣ ΕΠΙΧΕΙΡΗΣΗΣ ή ΥΠΗΡΕΣΙΑΣ</strong>:</td>
		</tr>
		
		
		<tr>
        <td colspan="2">
		  <textarea  name="Responsible_Business"  id="Responsible_Business" rows="2" cols="40" value="'.$Responsible_Business.'"  ></textarea>
        </td>
		</tr>
		
		<tr>
		  <td class="right"><strong>ΤΗΛ:</strong>:</td>
		  <td>
		    <input type="text" name="phone_Responsible_Business"  id="phone_Responsible_Business" size="25" maxlength="40" value="'.$phone_Responsible_Business.'" />
          </td>
        </tr>
	  
	  	<tr>
          <td colspan="2" ><strong>ΥΠΕΥΘΥΝΟΣ ΠΑΡΑΚΟΛΟΥΘΗΣΗΣ</strong>:</td>
		</tr>
		<tr>
         <td colspan="2">
		   <textarea  name="Responsible_monitoring"  id="Responsible_monitoring" rows="2" cols="40" value="'.$Responsible_monitoring.'"  ></textarea>
         </td>
		</tr>
		<tr>
		  <td class="right"><strong>ΤΗΛ:</strong>:</td>
		
		  <td> 
		   <input type="text" name="phone_Responsible_monitoring"  id="phone_Responsible_monitoring" size="25" maxlength="40" value="'.$phone_Responsible_monitoring.'" />
         </td>
        </tr>

	  
	  <!--   ----------------------        διευθυνση_επιχειρισης -->
	  <tr>
        <td  colspan=2 ><strong>ΔΙΕΥΘΥΝΣΗ ΕΠΙΧΕΙΡΗΣΗΣ Η ΥΠΗΡΕΣΙΑΣ</strong>:</td>
       </tr>  
	  
	  <tr>
        <td class="right"><strong>οδος</strong>:</td>
        <td>
          <input type="text" name="street"  id="street" size="25" maxlength="40" value="'.$street.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>αριθμος</strong>:</td>
        <td>
          <input type="text" name="number"  id="number" size="25" maxlength="40" value="'.$number.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>ταχ/κος κωδικας</strong>:</td>
        <td>
          <input type="text" name="postal_code"  id="postal_code" size="25" maxlength="40" value="'.$postal_code.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>πολη/χωριο</strong>:</td>
        <td>
          <input type="text" name="town_village"  id="town_village" size="25" maxlength="40" value="'.$town_village.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>τηλεφωνο:</strong>:</td>
        <td>
          <input type="text" name="phone_business_address"  id="phone_business_address" size="25" maxlength="40" value="'.$phone_business_address.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>fax</strong>:</td>
        <td>
          <input type="text" name="fax"  id="fax" size="25" maxlength="40" value="'.$fax.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>e-mail</strong>:</td>
        <td>
          <input type="text" name="e_mail"  id="e_mail" size="25" maxlength="40" value="'.$e_mail.'" />
        </td>
      </tr>
	  
	  <tr>
          <td  colspan="2"><strong>ΑΝΤΙΚΕΙΜΕΝΟ ΕΠΙΧΕΙΡΗΣΗΣ</strong>:</td>
      </tr>  
		

		
		<tr>
		 <td colspan="2"  align="center">
          <textarea  name="enterprise_object"  id="enterprise_object" rows="8" cols="40" value="'.$enterprise_object.'"  ></textarea>
		  
         </td>
        </tr>
	 	 	 
 </table>
   	  
<h1 align="center">ΠΡΟΣ</h1>	  	  	  		
     	
	<table width="100%" cellpadding="3" cellspacing="2" border="2" >
	
	 
        <tr class="right"><td colspan="2"><strong>Τ.Ε.Ι. - ΣΧΟΛΗ ΤΕΧΝ/ΓΙΚΩΝ ΕΦΑΡΜΟΓΩΝ</strong>:</td></tr>
        <tr class="right"><td colspan="2"><strong>Τμημα Τεχνολογιας Πληροφορικης και Τηλεπικοινωνιων</strong></td></tr>
		<tr><td colspan="2"><strong>Τηλ. 2410-684387, email:<a href=secry@cs.teilar.gr>secry@cs.teilar.gr</a></strong></td></tr>
		<tr align="right"><td colspan="2"><strong>Λαρισα </strong><input type="text" name="date_practice" id="date_practice" value="2013-06-20" size="10"  maxlength="10" /> 
		<strong>2013-06-20 <p>καπως ετσι θα εισαγεται η ημερομηνια χρονος-μηνας-μερα </p> </strong>
		</td></tr>
		
		<tr><td colspan="2"><strong>Παρακαλω να μου εγκρινετε τη θεση πρακτίκης άσκησης και να μου χορηγήσετε τα απαραίτητα δικαιολογητικά.το αντικείμενο απασχόλησής 
		μου θα είναι:</strong></td></tr>
		
		<tr>
		 <td colspan="2"  align="center">
          <textarea  name="employment_subject"  id="employment_subject" rows="8" cols="40" value="'.$employment_subject.'"   ></textarea>
		  
         </td>
        </tr>
		
		<tr>
        <td class="right"><strong>Φύλο</strong>:</td>
        <td>
          <input id="sex1" type="radio" name="sex" value="1" />
          <label for="sex1">Ανδρας</label>
          &nbsp;&nbsp;&nbsp;          
          <label><input type="radio" id="sex2" name="sex" value="0" />Γυναίκα</label>
        </td>
      </tr>
	  
	  <!-- υπογραφη -->
	  <tr><td colspan="2"></td></tr>
	  <tr><td colspan="2"></td></tr>
	  <tr>
        <td class="right" colspan="2"><strong>(υπογραφη)</strong></td>
       </tr>
	</table>	
		
		 <!-- πινακας Εγκρινεται απο την Επιτροπη Πρακτικης Ασκησης -->
		 <table width="80%" cellpadding="3" cellspacing="2" border="2" align="center">
			<tr class="left" ><td colspan="2"><strong>Εγκρινεται απο την Επιτροπη Πρακτικης Ασκησης</strong>:</td></tr>
			<tr class="left"><td colspan="2"><strong>Κακαροτζα Γεωργιος <a href=gkakaron@teilar.gr>gkakaron@teilar.gr</a></strong>:</td></tr>
			<tr class="left"><td colspan="2"><strong>Χαϊκαλης Κωνσταντινος <a href=Kchaikalis@teilar.gr>Kchaikalis@teilar.gr</a></strong>:</td></tr>
			<tr class="left"><td colspan="2"><strong>Κοκκορας Φωτιος <a href=fkokkoras@teilar.gr>fkokkoras@teilar.gr</a></strong>:</td></tr>
			
			<tr><td colspan="2"></td></tr>  <!--κενο-->
			
			<tr>
			  <td class="right"><strong>Αριθ. Αρχειου Πρακτικης:</strong>:</td>
			  <td>
				<input type="text" name="File_Number_practice"  id="File_Number_practice" size="25" maxlength="40" value="'.$File_Number_practice.'" />
			  </td>
			</tr>
			
		   <tr>
			  <td class="right"><strong>Κωδικος Αριθ. Πρακτικου:</strong>:</td>
			  <td>
				<input type="text" name="code_Number_practice"  id="code_Number_practice" size="25" maxlength="40" value="'.$code_Number_practice.'" />
			  </td>
			</tr>
		 </table>
		
	<table width="100%" cellpadding="3" cellspacing="2" border="2" >	
		<tr><td colspan="2">&nbsp;</td></tr>  <!--κενο-->
		<tr><td colspan="2">&nbsp;</td></tr>  <!--κενο-->
		
		<!-- ΠΛΗΡΗΣ ΔΙΕΥΘΥΝΣΗ ΣΠΟΥΔΑΣΤΗ/ΣΠΟΥΔΑΣΤΡΙΑΣ -->
		
		<tr class="left" ><td colspan="2"><strong>ΠΛΗΡΗΣ ΔΙΕΥΘΥΝΣΗ ΣΠΟΥΔΑΣΤΗ/ΣΠΟΥΔΑΣΤΡΙΑΣ</strong>:</td></tr>
		
		<!--  1η περιπτωση επικοινωνιας -->
		
		<tr class="left" ><td colspan="2"><strong>&nbsp;&nbsp;----1η περιπτωση επικοινωνιας----</strong>:</td></tr>
		
		<tr>
        <td class="right"><strong>οδος</strong>:</td>
        <td>
          <input type="text" name="street1"  id="street1" size="25" maxlength="40" value="'.$street1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>αριθμος</strong>:</td>
        <td>
          <input type="text" name="number1"  id="number1" size="25" maxlength="40" value="'.$number1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>ταχ/κος κωδικας</strong>:</td>
        <td>
          <input type="text" name="postal_code1"  id="postal_code1" size="25" maxlength="40" value="'.$postal_code1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>πολη/χωριο</strong>:</td>
        <td>
          <input type="text" name="town_village1"  id="town_village1" size="25" maxlength="40" value="'.$town_village1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>τηλεφωνο:</strong>:</td>
        <td>
          <input type="text" name="phone_business_address1"  id="phone_business_address1" size="25" maxlength="40" value="'.$phone_business_address1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>fax</strong>:</td>
        <td>
          <input type="text" name="fax1"  id="fax1" size="25" maxlength="40" value="'.$fax1.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>e-mail</strong>:</td>
        <td>
          <input type="text" name="e_mail1"  id="e_mail1" size="25" maxlength="40" value="'.$e_mail1.'" />
        </td>
      </tr>
		
		<!--  2η περιπτωση επικοινωνιας -->
		
		<tr class="left" ><td colspan="2"><strong>&nbsp;&nbsp;----2η περιπτωση επικοινωνιας----</strong>:</td></tr>
		
		<tr>
        <td class="right"><strong>οδος</strong>:</td>
        <td>
          <input type="text" name="street2"  id="street2" size="25" maxlength="40" value="'.$street2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>αριθμος</strong>:</td>
        <td>
          <input type="text" name="number2"  id="number2" size="25" maxlength="40" value="'.$number2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>ταχ/κος κωδικας</strong>:</td>
        <td>
          <input type="text" name="postal_code2"  id="postal_code2" size="25" maxlength="40" value="'.$postal_code2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>πολη/χωριο</strong>:</td>
        <td>
          <input type="text" name="town_village2"  id="town_village2" size="25" maxlength="40" value="'.$town_village2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>τηλεφωνο:</strong>:</td>
        <td>
          <input type="text" name="phone_business_address2"  id="phone_business_address2" size="25" maxlength="40" value="'.$phone_business_address2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>fax</strong>:</td>
        <td>
          <input type="text" name="fax2"  id="fax2" size="25" maxlength="40" value="'.$fax2.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>e-mail</strong>:</td>
        <td>
          <input type="text" name="e_mail2"  id="e_mail2" size="25" maxlength="40" value="'.$e_mail2.'" />
        </td>
      </tr>
	 	  
<!--     ΤΕΛΟΣ         --------------------          -->
	  <tr>
        <td>&nbsp; 	ΕΠΕΛΕΞΕ ΤΙ ΘΕΛΕΙΣ</td>
        <td>
          <input name="reset" type="reset" id="reset" value="Καθάρισμα" />
          <input name="submit" type="submit" id="submit" value="Αποστολή" />
        </td>
      </tr>
     </table>
   </form>
   ' ;
?>

<!--	 
$subject_practice_id = $_SESSION['subject_practice_id'];  // ΤΟ ΕΧΩ ΣΤΟ  profesor_see_students_B. 92 ΓΡΑΜΜΗ .
-->
	 
<!--    ΟΛΑ ΟΚ    οχι session start θελει μονο στο login ,δηλαδη στο homepage -->	 
<?php require('is_logged_in.php'); ?>	 
<?php require('header.php'); ?>	 
	 
    <div id="leftsidebar">
      <ul class="menu">
	     <li><a href="homepage.php">θελεις να επιστρεψεις στην μητρικη σελιδα 
		 πατα εδω </a>  </p></li>
		 <li><a href="profesor_see_students_B.php">θελεις να επιστρεψεις στην προηγουμενη  ιστοσελιδα 
		 πατα εδω </a>  </p></li>
         <li>ΚΑΛΩΣ ΗΡΘΕΣ <?php echo "".$_SESSION["username"].""; ?></li>
		 		 
		 <?php if ( isset($_SESSION['$request_master_id']) ) { ?>
		 <li><a href="print_request.php">θελεις να εκτυπωσεις
		 πατα εδω </a>  </p></li>
         <?php } ?>
		 				 
	    <?php if ( isset($_SESSION['username']) ) { ?>
	      <li><a href="logout.php">logout</a></li>
	    <?php } ?>
				 
      </ul>
    </div>			
<div id="main">
	   
      <img align="center"  alt="" src="images/aitisi_egkrisis_praktikis.pdf" width="80" height="80" />
      <h1 align="center">ΑΙΤΗΣΗ</h1>
    		
     <!-- onsubmit="return validate_form();-->
<?php echo $block; ?>

</div>	<!-- main -->

<?php require('footer.php'); ?>
	