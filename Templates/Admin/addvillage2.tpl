<form method="post" action="Admin/admin2.php">
<input name="action" type="hidden" value="addVillage">
<input name="uid" type="hidden" value="<?php echo $session->uid;?>">
<table id="member" style="width: 225px;"> 
<thead>
<tr>
<th colspan="2">Buy this Village for 250 Gold</th>
</tr>
</thead>   
<tr>
<td colspan="2"><center>Coordinates (<b>X</b>|<b>Y</b>)</center></td>
</tr>  
<tr>
<td>X Co-ord:</td>
<td><input name="x" class="fm" value="<?php echo $id = $_GET['x']; ?>" type="input">
</td>
</tr>
<tr>
<td>Y Co-ord:</td>
<td><input name="y" class="fm" value="<?php echo $id = $_GET['y']; ?>" type="input">
</td>
</tr>
<tr>
<td colspan="2">
<center>
<input value="Buy this Village for 250 Gold" type="submit">
<?php
error_reporting (E_ALL ^ E_NOTICE);
include ("extra_mysql.php");
$check = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysqli_error());
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
die('Username id or Village id is wrong. <a href=dorf1.php>Click Here to go back to your village</a>');
}
$check2 = mysqli_num_rows($check);
if ($check2 == 0) {
die('Username uid or Village id is wrong. <a href=dorf1.php>Click Here to go back to your village</a>');
}                
$sql = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysqli_error());
while($row = mysqli_fetch_array($sql)){};
$sql = mysqli_query($database->connection, "SELECT * FROM ".TB_PREFIX."users WHERE id  = '".$session->uid."'")or die(mysqli_error());
while($row = mysqli_fetch_array($sql)){
$gold = $row["gold"];};
if ($gold < 100 ) {die('Sorry you dont have enough gold');}
else {
$uid = '$session->uid';
$vref = '$village->wid';
mysqli_query($database->connection, "UPDATE ".TB_PREFIX."users SET `gold` = `gold`- 250  WHERE id =".$session->uid."")or die(mysqli_error());}
echo "<br />Done";
?>
</center>
</td>
</tr>     
</table>