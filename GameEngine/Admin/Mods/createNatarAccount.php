<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       createNatarAccount.php                                      ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("../../Database/connection.php");
include_once("../../config.php");
include_once("../../Database/db_MYSQLi.php");

error_reporting(E_ALL);

$session = $_POST['admid'];

$sql = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id = ".$session."");
$access = mysqli_fetch_array($sql);
$sessionaccess = $access['access'];

if($sessionaccess != 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

function generateBase($kid, $uid, $username)
{
	global $database, $message;
	if($kid == 0)
	{
        $kid = rand(1, 4);
	}
	else
	{
		$kid = $_POST['kid'];
	}

	$wid = $database->generateBase($kid);
	$database->setFieldTaken($wid);
	$database->addVillage($wid, $uid, $username, 1);
	$database->addResourceFields($wid, $database->getVillageType($wid));
	$database->addUnits($wid);
	$database->addTech($wid);
	$database->addABTech($wid);
	$database->updateUserField($uid, "access", USER, 1);
	##$message->sendWelcome($uid, $username);
}

## Create Account and Capital

$username = "Natars";
$password = md5('013ab00e4' . rand(999999999999, 9999999999999999999999999) . 'f248588ed');
$email = "natars@travianx.com";
$tribe = 5;
$desc = "********************
            [#natars]
        ********************";
$q = "INSERT INTO " . TB_PREFIX . "users (id,username,password,access,email,timestamp,tribe,location,act,protect) VALUES (3, '$username', '$password', " . USER . ", '$email', ".time().", $tribe, '', '', 0)";
mysqli_query($database->connection, $q);
unset($q);
$uid = $database->getUserField($username, 'id', 1);
generateBase(0, $uid, $username);
$wid = mysqli_fetch_assoc(mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."vdata WHERE owner = $uid"));
$q = "UPDATE ".TB_PREFIX."vdata SET pop = 834 WHERE owner = $uid";
mysqli_query($database->connection, $q) or die(mysqli_error($database->connection));
$q2 = "UPDATE ".TB_PREFIX."users SET access = 0 WHERE id = $uid";
mysqli_query($database->connection, $q2) or die(mysqli_error($database->connection));

if(SPEED > 3)
{
	$speed = 5;
}
else
{
	$speed = SPEED;
}
$q3 = "UPDATE " . TB_PREFIX . "units SET u41 = " . (64700 * $speed) . ", u42 = " . (295231 * $speed) . ", u43 = " . (180747 * $speed) . ", u44 = " . (7 * $speed) . ", u45 = " . (364401 * $speed) . ", u46 = " . (217602 * $speed) . ", u47 = " . (2034 * $speed) . ", u48 = " . (1040 * $speed) . " , u49 = " . (1 * $speed) . ", u50 = " . (9 * $speed) . " WHERE vref = " . $wid['wref'] . "";
mysqli_query($database->connection, $q3) or die(mysqli_error($database->connection));
$q4 = "UPDATE " . TB_PREFIX . "users SET desc2 = '$desc' WHERE id = $uid";
mysqli_query($database->connection, $q4) or die(mysqli_error($database->connection));

header("Location: ../../../Admin/admin.php?p=npctribecreatenatar&g&wid=".$wid['wref']."&uid=".$uid."");
?>