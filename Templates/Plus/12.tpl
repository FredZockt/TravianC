<?php
    
    $golds = $database->getUserArray($session->username, 0);
    $goldlog = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."gold_fin_log") or die(mysqli_error($database->connection));

if($session->gold >= 5) {

	if($golds['b4'] <= time()) {
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users set b4 = '0' where `username`='".$session->username."'") or die(mysqli_error($database->connection));
	}


	if($golds['b4'] == 0) {
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users set b4 = ".time()."+".PLUS_PRODUCTION." where `username`='".$session->username."'") or die(mysqli_error($database->connection));
	} else {
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users set b4 = b4 + ".PLUS_PRODUCTION." where `username`='".$session->username."'") or die(mysqli_error($database->connection));
	}


mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users set gold = ".($session->gold-5)." where `username`='".$session->username."'") or die(mysqli_error($database->connection));

mysqli_query($database->connection, "INSERT INTO ".TB_PREFIX."gold_fin_log VALUES ('".(mysqli_num_rows($goldlog)+1)."', '".$village->wid."', '+25%  Production: Crop')") or die(mysqli_error($database->connection));

}

header("Location: plus.php?id=3");

 ?>