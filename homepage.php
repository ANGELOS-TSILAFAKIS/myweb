<?php
session_start();// ΜΟΝΟ ΕΔΩ ΠΡΕΠΕΙ!!! KAI STO LOGIN
?>
<?php
header("Content-Tyre: text/html;charset=UTF8");
//header("Content-Language: en");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 4.01 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:Lang="el">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" />
<!--<meta http-equiv="Content-Language" content="en" />-->
<meta http-equiv="Refresh" CONTENT="60; URL=homepage.php">

<!-- Περιγραφουμε την ιστοσελιδα. 
Αυτη η περιγραφη θα εμφανιστει στον χρηστη, που θα την αναζητηση σε μια μηχανη αναζητησης.
Μαζι με τον τιτλο παιζουν το πιο σπουδιαο ρολο για την μηχανη αναζητησης. 
Ειναι αλλωστε αυτα που βλεπει ο χρηστης. -->
<meta name="description" content="Οι φοιτητες μπορουν να κανουν εγγραφη στο συστημα.
 Οι φοιτητες μπορουν να κανουν αιτηση και να την εκτυπωσουν αποτο συστημα." >

<!--  Λεξεις, που αντιπροσωπευουν την εφαρμογη μας. Η μηχανη αναζητησης την λαμβανει λιγο υποψη.  --> 
<meta name="keywords" content="πρακτικη, αιτηση, πληροφορικη, σπουδαστης, καθηγητες, web, εφαρμογη,
 εκτυπωση, συνεδριαση">
 
<!--Όταν δηλώσουμε το CONTENT ως index, το λογισμικό αναζήτησης και καταχώρησης σελίδων του εργαλείου αναζήτησης λαμβάνει την εντολή να καταχωρήσει αυτή την σελίδα.
 Αν το CONTENT έχει δηλωθεί ως noindex, τότε η σελίδα αυτή δεν θα καταχωρηθεί  
 Επίσης, όταν το CONTENT έχει δηλωθεί ως follow, αυτό σημαίνει πως το λογισμικό αναζήτησης και καταχώρησης πρέπει να ακολουθήσει τις παραπομπές που υπάρχουν στην παρούσα σελίδα.
 Αν έχει δηλωθεί ως nofollow (π.χ. διότι οι παραπομπές οδηγούν σε σελίδες οι οποίες δεν θέλουμε να καταχωρηθούν), τότε το λογισμικό θα τις αγνοήσει.  -->
 <META NAME="robots" CONTENT="index,follow">
 
<!-- σηνειωνουμε τον συγγραφεα της ιστοσελιδας   -->
<meta name="angel" content="tsilafakis" />

<!-- Ο ΤΙΤΛΟΣ ΘΑ ΠΡΕΠΕΙ ΝΑ ΕΙΝΑΙ ΜΕΤΑΞΥ 20 ΜΕ 100 ΧΑΡΑΚΤΗΡΕΣ. 
ΠΑΙΖΕΙ ΣΗΜΑΝΤΙΚΟΤΑΤΟ ΡΟΛΟ ΓΑΙ ΤΗΝ ΜΗΧΑΝΗ ΑΝΑΖΗΤΗΣΗΣ.
 Μαζι με τον τιτλο παιζουν το πιο σπουδιαο ρολο για την μηχανη αναζητησης. 
Ειναι αλλωστε αυτα που βλεπει ο χρηστης.  -->
  <title>ΑΙΤΗΣΗ ΠΡΑΚΤΙΚΗΣ ΤΩΝ ΣΠΟΥΔΑΣΤΩΝ ΓΙΑ ΤΟ ΤΜΗΜΑ ΠΛΗΡΟΦΟΡΙΚΗΣ</title>
  <link rel="stylesheet" type="text/css" href="mycss.css"/>

</head>

<body>
  <div id="container">
  
    <div id="header">

      <h1>Τ.Ε.Ι. ΠΛΗΡΟΦΟΡΙΚΗΣ</h1>
    </div>	
  
    <div id="leftsidebar">
      <ul class="menu">
     
        <!-- αφου κανουμε το συνδεση(login) τοτε μπαινουμε στην ιστοσελιδα student_login_html.php -->
				
		<?php if( (!isset($_SESSION["username"])) && (!isset($_SESSION["level"]))  ) { 
		// δεν εχει κανει συνδεση (login) 

		$block = '
		        <li><a href="STUDENT_REGISTRATION_html.php">εγγραφη φοιτητη</a></li>
		    
		        <h3>ΠΑΡΑΚΑΛΩ ΣΥΝΔΕΣΟΥ ΣΤΟ ΣΥΣΤΗΜΑ:</h3>

		        <form name="form1" method="post" action="student_login.php">
                <p><h3>ΟΝΟΜΑ ΧΡΗΣΤΗ: </h3><input type="text" name="username" size="20" maxlength="40" value="" /> </p>
                <p><h3>ΚΩΔΙΚΟΣ ΧΡΗΣΤΗ: </h3><input type="password" name="password" size="20" maxlength="40" value="" /> </p>
                <p><input name="submit" type="submit" value="ΣΥΝΔΕΣΗ"></p>
                </form>';
		// εχει κανει συνδεση (login) 
		
		 } else if ($_SESSION['level'] == 2 ) {
		 // ΚΑΘΗΓΗΤΗΣ ΟΙ ΙΣΤΟΣΕΛΙΔΕΣ ΠΟΥ ΜΠΟΡΕΙ ΝΑ ΕΧΕΙ ΠΡΟΣΒΑΣΗ		 	 		 
		$block = "<li><p>καλως ηρθες καθηγητα ".$_SESSION["username"]."!</p></li>";
		$block .= '<li><a href="STATS_NAME_STUDENT.php">μπορεις να δεις τις αιτησεις των φοιτητων</a></li>';
		$block .= '<li><a href="profesor_html.php">διημιουργια συνεδριασης</a></li>';
		} else if ($_SESSION['level'] == 1 ) {
		//ΦΟΙΤΗΤΗΣ ΟΙ ΙΣΤΟΣΕΛΙΔΕΣ ΠΟΥ ΜΠΟΡΕΙ ΝΑ ΕΧΕΙ ΠΡΟΣΒΑΣΗ
		$block = "<li><p>καλως ηρθες φοιτητη ".$_SESSION["username"]."!</p></li>";
		//$block .= '<li><a href="practice_html.php">practice_html</a></li>';
		$block .= '<li><a href="profesor_see_students_B.php">μπορεις να κανεις αιτηση</a></li>';
		}?>
		<?php  echo "$block"; ?>
		
	    <?php if ( isset($_SESSION['username']) ) { ?>
	      <li><a href="logout.php">ΑΠΟΣΥΝΔΕΣΗ</a></li>
		  	  
	    <?php } ?>
						
      </ul>
    </div>
	 
    <div id="main">
	
      <h2> καλως ηρθες στην ιστοσελιδα . για την online αιτηση πρακτικης των σπουδαστων του τμηματος πληροφορικης  </h2>
	  	  
	  <h3>οι φοιτητες μπορουν να : </h3>
	  <ul> 
		<li> <strong> δημιουργησουν λογαριασμο στο συστημα  </strong>   </li>
	    <li> <strong> κανουν την αιτηση online και να την εκτυπωσουν απο το συστυμα  </strong>    </li>
		<li> <strong>  οι φοιτητες μπορουν να υποβαλλουν αιτησεις μονο εφοσον δημιουργηθει μια συνεδριαση και ειναι ενεργη.
		(δηλαδη οι συνεδριασεις εχουν ημερομηνια εναρξης και ληξης).   </strong>    </li>
	  </ul> 	  
	  <h3>η επιτροπη πρακτικης ασκησης μπορει να  : </h3>
	  <ul> 
	     <li> <strong>δημιουργησει συνεδριασεις επιτροπης πρακτικης ασκησης .</strong>    </li>
	     <li> <strong> δει τις αιτησεις που κανουν οι φοιτητες σε πραγματικο χρονο και στατιστικα στοιχεια </li> </strong>	  	 	  
    </div>
 
    <div id="footer">
      <div id="leftfooter">&copy; Τ.Ε.Ι. ΛΑΡΙΣΑΣ</div>
      <div id="rightfooter">ΣΧΕΔΙΑΣΗ: Η ηλεκτρονική αίτηση για την πρακτική άσκηση</div>
    </div>
  
  </div>

</body>
</html>