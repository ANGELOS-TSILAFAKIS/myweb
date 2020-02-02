<?php

/*
Η ΔΗΜΙΟΥΡΓΙΑ συνεδριασης και μετα πρακτικη για τους φοιτητες  
ΕΔΩ ΘΑ ΕΧΟΥΜΕ ΚΑΙ ΤΟ ΧΡΟΝΟ ΚΑΤΑΣΤΡΟΦΗΣ ΤΟΥ ΘΕΜΑΤΟΣ     
 ok 
*/
	 
//εδω οι καθηγητες δηλωνουν την πρακτικη . μετα αυτη γινεται προσβασιμη με διαφορετικο τροπο στους
// καθηγητες και στους φοιτητες

require('include.php');

require('profesor_javascript.php');

/*
1.εχουμε εναν πινακα θεμματα καθηγητων  = subject_profesor το εχω κανει στο αλλο

e_mail
title
text
subject_practice_create_time
subject_practice_delete_time
date_added
date_modified

*/

$block = '
<table id="userdata" name="userdata" width="100%" cellpadding="3" cellspacing="2" border="2"    class="signup" >
    ';
	
 if ($_POST) {
	
  $block .= '  

   <th colspan="2" align="center">δωσε τα διωρθωμενα στοιχεια που παρουσιαζονται</th>

<tr><td colspan="2">τα παρακατω λαθος στοιχεια ειναι τα εξης:<br />
στην φορμα σου <p><font color=red size=3><i>"'.$fail.'"</i></font></p>
</td></tr>


    ';
 } 

  $block .= '   </table>

    <form  id="userdata" name="userdata" action="'.$_SERVER["PHP_SELF"].'" method="POST"  >
       
	   <table id="userdata" name="tableuserdata" width="100%" cellpadding="3" cellspacing="2" border="2"    >
		  <tr>
			<td width="25%">&nbsp;</td>
			<td><em>Τα πεδία με έντονη γραφή είναι υποχρεωτικά!</em></td>
		  </tr>
		  <tr>			
			<td class="right" width="20%"><strong>e_mail</strong>:</td>	
            <td>			
			  <input type="text" name="e_mail" id="e_mail" size="25" maxlength="40" value="'.$e_mail.'" />
			</td>
		  </tr>
		  <tr>
			<td class="right" width="20%"><strong>τιτλος</strong>:</td>	
			<td>
			  <input type="text" name="title" id="title" size="25" maxlength="40"  value="'.$title.'"  />
			</td>
		  </tr>		  		  
		  <tr>
            <td class="right" width="20%"><strong>κειμενο</strong>:</td>	
			<td>
			  <textarea  name="text"  id="text" rows="8" cols="40" value="'.$text.'"   /></textarea>
			</br>
			</td>
		  </tr>
		  <tr>
            <td class="right" width="20%"><strong>θεμα πρακτικης χρονικη εναρξη</strong>:</td>
			<td>


		    <p><strong>From:</strong><br/></p>
			';
			
							   
		$blockB = '		   
				   
			  <input type="text" name="subject_practice_create_time" id="subject_practice_create_time" size="25" maxlength="40"  value="'.$subject_practice_create_time.'"    />
			<strong>2013-06-20 <p>καπως ετσι θα εισαγεται η ημερομηνια χρονος-μηνας-μερα </p> </strong>
			</td>
		  </tr>
		  <tr>
            <td class="right" width="20%"><strong>θεμα πρακτικης χρονικη ληξη</strong>:</td>
			<td>
			
			
			<p><strong>To:</strong><br/></p>
			
			';

				
		$blockC = '	
			<input type="text" name="subject_practice_delete_time" id="subject_practice_delete_time" size="25" maxlength="40"   value="'.$subject_practice_delete_time.'"      />
			<strong>2014-06-20 <p>καπως ετσι θα εισαγεται η ημερομηνια χρονος-μηνας-μερα </p> </strong>
			</td>
		  </tr>
		  
		  <tr>
			<td class="right" width="20%"><strong>	ΕΠΕΛΕΞΕ ΤΙ ΘΕΛΕΙΣ</strong>:</td>
			<td>
			  
			  <input name="reset" type="reset" id="reset" value="Καθάρισμα" />
			  <input name="submit" type="submit" id="submit" value="Αποστολή" />
			</td>
		  </tr>
 
      </table>
   </form>
   
         ';  
		  
	?>




<!--    ΟΛΑ ΟΚ         -->	 
<?php require('is_logged_in.php'); ?>	 
<?php require('header.php'); ?>	 	
  
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
			
		<?php echo "$block"; ?>


		<?php echo "$blockB"; ?>


		<?php echo "$blockC"; ?>
	</div>
 
<?php require('footer.php'); ?>
	
	