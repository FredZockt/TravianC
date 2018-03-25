<?php

//set_time_limit(0);
include("connection.php");
include("constant.php");

class MYSQLI_DB {
	
	var $connection;
	
	function MYSQLI_DB() {
		$this->connection = mysqli_connect(SQL_SERVER, SQL_USER, SQL_PASS,SQL_DB) or die(mysqli_error($this->connection));
	}
	
	function mysqli_exec_batch ($p_query, $p_transaction_safe = true) {
  if ($p_transaction_safe) {
      $p_query = 'START TRANSACTION;' . $p_query . '; COMMIT;';
    };
  $query_split = preg_split ("/[;]+/", $p_query);
  foreach ($query_split as $command_line) {
    $command_line = trim($command_line);
    if ($command_line != '') {
      $query_result = mysqli_query($this->connection, $command_line);
      if ($query_result == 0) {
        break;
      };
    };
  };
  return $query_result;
} 

	function query($query) {
		return mysqli_query($this->connection, $query);
	}
};

if(DB_TYPE === 2) {
	$database = new PDO_DB;
}
else {
	$database = new MYSQLI_DB;
}
?>