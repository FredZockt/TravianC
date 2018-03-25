<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       medals.php                                                  ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
#################################################################################

include_once("../../Account.php");

if ($session->access < ADMIN) die("Access Denied: You are not Admin!");

$userid = $_POST['userid'];
mysqli_query($database->conenction, "DELETE FROM ".TB_PREFIX."medal WHERE userid = ".$userid."");

header("Location: ../../../Admin/admin.php?p=player&uid=".$userid."");
?>