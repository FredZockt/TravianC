<?php
if($_GET){
	include_once ("GameEngine/Database/connection.php");
	include_once ("GameEngine/config.php");
	$link = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS, SQL_DB);
	switch($_GET['f']) {
		case 'qst':
			if (isset($_GET['qact'])){
				$qact=$_GET['qact'];
			}else {
				$qact=null;
			}
			if (isset($_GET['qact2'])){
				$qact2=$_GET['qact2'];
			}else {
				$qact2=null;
			}
			if (isset($_GET['qact3'])){
				$qact3=$_GET['qact3'];
			}else {
				$qact3=null;
			}
			include("Templates/Ajax/quest_core.tpl");		
		break;
	}
	switch($_GET['cmd']) {
		
		case 'changeVillageName':
			$q = "UPDATE " . TB_PREFIX . "vdata SET `name` = '" . $_POST['name'] . "' where `wref` = '" . $_POST['did'] . "'";
    		mysqli_query($link, $q);
		break;
		
		case 'mapLowRes':
			$x = $_POST['x'];
			$y = $_POST['y'];
			$xx = $_POST['width'];
			$yy = $_POST['height'];
			
			include("Templates/Ajax/mapscroll.tpl");
		break;
	}

}
?>
