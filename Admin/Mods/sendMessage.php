<?php
#################################################################################
##              -= YOU MAY NOT REMOVE OR CHANGE THIS NOTICE =-                 ##
## --------------------------------------------------------------------------- ##
##  Filename       sendMessage.php                                             ##
##  Developed by:  aggenkeech                                                  ##
##  License:       TravianX Project                                            ##
##  Copyright:     TravianX (c) 2010-2011. All rights reserved.                ##
#################################################################################

include_once("../../GameEngine/Account.php");

if ($session->access < ADMIN) die("Access Denied: You are not Admin!");

$uid = $_POST['uid'];
$topic = $_POST['topic'];
$message = $_POST['message'];
$time = time();

$query = "INSERT INTO ".TB_PREFIX."mdata (target, owner, topic, message, viewed, time) VALUES ('$uid', 1, '$topic', '$message', 0, '$time')";

mysqli_query($database->conenction, $query);

header("Location: ../../../Admin/admin.php?p=Newmessage&uid=".$uid."&msg=ok");
?>