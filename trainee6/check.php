<?php
function checkMail($email){
	if(strlen($email)==0)
		return false;
	if (eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) 
		return true;
	else
    	return false;
}
?>