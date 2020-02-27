<?php
@session_start();
if($_SESSION["autentica"] != "SIP"){	
	header("Location: error.php");
	exit();
}
?>
