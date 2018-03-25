<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       delallymedal.php                                            ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2012. All rights reserved.                ##
##                                                                             ##
#################################################################################

include_once("../../Database/connection.php");
include_once("../../config.php");
include_once("../../Database/db_MYSQLi.php");

$delete = $_POST['medalid'];
$aid = $_POST['aid'];
$session = $_POST['admid'];

$sql = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id = ".$session."");
$access = mysqli_fetch_array($sql);
$sessionaccess = $access['access'];

if($sessionaccess != 9) die("<h1><font color=\"red\">Access Denied: You are not Admin!</font></h1>");

mysqli_query($database->connection, "DELETE FROM ".TB_PREFIX."allimedal WHERE id = ".$delete."");

header("Location: ../../../Admin/admin.php?p=alliance&aid=".$aid."");
?>