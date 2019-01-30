<?php
function f_check_email_address($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  
  if (filter_var($email, FILTER_VALIDATE_EMAIL) !== false) {
	 return true;
 }
  
  return false;
 
}
?>