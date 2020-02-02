<?php
//εδω γινεται η εγγραφη του φοιτητη 

require('include.php');

require('register_student_javascript.php');

//ενα απο τα δυο block  θα εμφανιστουν   <?php echo "$fail";  
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
        <td><em>Ολα τα πεδία είναι υποχρεωτικά!</em></td>
      </tr>
	 <tr>
        <td class="right" width="20%"><strong>ονομα_χρηστη</strong>:</td>
        <td>
          <input type="text" name="username"  size="25" maxlength="40" value="'.$username.'" />
        </td>
      </tr>
      <tr>
        <td class="right"><strong>κωδικος_χρηστη</strong>:</td>
        <td>
          <input type="password" name="password" id="password" size="25" maxlength="40" />
        </td>
      </tr>
      <tr>
        <td class="right"><strong>αριθμος_μητρωου</strong>:</td>    
        <td>
          <input type="text" name="afm" id="afm" size="25" maxlength="40" value="'.$afm.'" />
        </td>
      </tr>
      <tr>
        <td class="right"><strong>Ονομα</strong>:</td>
        <td>
          <input type="text" name="name"  id="name" size="25" maxlength="40" value="'.$name.'" />
        </td>
      </tr>
	  <tr>
        <td class="right"><strong>επωνυμο</strong>:</td>
        <td>
          <input type="text" name="surname"  id="surname" size="25" maxlength="40" value="'.$surname.'" />
        </td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td>
		  <input type="hidden" name="submitted" value="true" />
          <input name="reset" type="reset" id="reset" value="Καθάρισμα" />		  		  
          <input name="submit" type="submit" id="submit" value="Αποστολή" />
        </td>
      </tr>
     </table>
   </form>
    ';

?>

<?php include('header.php'); ?>	 
<?php echo_msg(); ?>	
  
    <div id="leftsidebar">
      <ul class="menu">
         
		 <li><a href="homepage.php">θελεις να επιστρεψεις στην μητρικη σελιδα 
		 πατα εδω </a></li>
		 		 
      </ul>
    </div>
 
    <div id="main">

<?php echo "$block"; ?>
	
</div>
  
<?php include('footer.php'); ?>
