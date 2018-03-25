<?php
        include ("../../GameEngine/Database/connection.php");
        include ("../../GameEngine/Database.php");
        include ("../../GameEngine/Admin/database.php");
        include ("../../GameEngine/config.php");

        $database->poulateOasisdata();  
        $database->populateOasis();
		$database->populateOasisUnitsLow();

header("Location: ../index.php?s=6");
?>