<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       editUser.php                                                ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("../../config.php");

$session = $_POST['admid'];
$id = $_POST['id'];

$sql = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id = ".$session."");
$access = mysqli_fetch_array($sql);
$sessionaccess = $access['access'];

if($sessionaccess != 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users SET 
	sit1 = '".$_POST['sitter1']."',
	sit2 = '".$_POST['sitter2']."' 
	WHERE id = $id") or die(mysqli_error($database->connection));

header("Location: ../../../Admin/admin.php?p=player&uid=".$id."");
?>