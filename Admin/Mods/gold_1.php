<?php

#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       gold_1.php                                                  ##
##  Developed by:  Dzoki                                                       ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
##                                                                             ##
#################################################################################
include_once("../../Account.php");
$link = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS,SQL_DB);
if ($session->access < ADMIN) die("Access Denied: You are not Admin!");

$id = $_POST['id'];
$admid = $_POST['admid'];
mysqli_query($link, "UPDATE ".TB_PREFIX."users SET gold = gold + ".$_POST['gold']." WHERE id = ".$id."");

$name = $database->getUserField($id,"username",0);
mysqli_query($link, "Insert into ".TB_PREFIX."admin_log values (0,$admid,'Added <b>".$_POST['gold']."</b> gold to user <a href=\'admin.php?p=player&uid=$id\'>$name</a> ',".time().")");

header("Location: ../../../Admin/admin.php?p=player&uid=".$id."&g=ok");
?>