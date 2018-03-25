<?php
//////////////     made by alq0rsan   /////////////////////////
    $MyGold = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE `username`='".$session->username."'") or die(mysqli_error($database->connection));
    $golds = mysqli_fetch_array($MyGold);

    $MyVilId = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."vdata WHERE `wref`='".$village->wid."'") or die(mysqli_error($database->connection));
    $uuVilid = mysqli_fetch_array($MyVilId);

    $totalT = ($T1+$T2+$T3+$T4);
    $totalR = ($uuVilid['6']+$uuVilid['7']+$uuVilid['8']+$uuVilid['10']);

    $goldlog = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."gold_fin_log") or die(mysqli_error($database->connection));

if($totalT <= $totalR) {
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."vdata set wood = '".$T1."' where `wref`='".$village->wid."'") or die(mysqli_error($database->connection));
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."vdata set clay = '".$T2."' where `wref`='".$village->wid."'") or die(mysqli_error($database->connection));
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."vdata set iron = '".$T3."' where `wref`='".$village->wid."'") or die(mysqli_error($database->connection));
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."vdata set crop = '".$T4."' where `wref`='".$village->wid."'") or die(mysqli_error($database->connection));
mysqli_query($database->connection, ("UPDATE ".TB_PREFIX."users set gold = ".($session->gold-3)." where `username`='".$session->username."'") or die(mysqli_error($database->connection));
mysqli_query($database->connection, "INSERT INTO ".TB_PREFIX."gold_fin_log VALUES ('".(mysqli_num_rows($goldlog)+1)."', '".$village->wid."', 'trade 1:1')") or die(mysqli_error($database->connection));
echo "";
} else {
echo "";
mysqli_query($database->connection, "INSERT INTO ".TB_PREFIX."gold_fin_log VALUES ('".(mysqli_num_rows($goldlog)+1)."', '".$village->wid."', 'Failed trade 1:1')") or die(mysqli_error($database->connection));

}

include("Templates/Plus/3.tpl");

 ?>