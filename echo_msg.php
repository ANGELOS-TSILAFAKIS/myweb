<?php 
//τυπώνει το πιθανό μύνηνα που υπάρχει στην παράμετρο msg του $_GET
function echo_msg() {
  if (isset($_GET['msg']))
    echo '" <p style="color:red;">'.$_GET['msg'].'</p> "';
}
?>