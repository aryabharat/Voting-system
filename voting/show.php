<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php 
     $server = "localhost";
$username = "root";
$password= "";
$database = "vote";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn) {
	die("connection failed:".mysqli_connect_error());
}

$sql ="SELECT * FROM `table1`";
$run = mysqli_query($conn,$sql);
echo "<table>";
while ($row = mysqli_fetch_array($run)) {
	echo "<tr>";
	echo "<td>";?>
	<form  method="post">
	<img src="<?php echo $row["images"]; ?>" width="200" height="200">
	<input type="submit" name="submit" value="VOTE <?php echo $row["id"]; ?>" onclick="myFunction()">
</form>
	<?php echo "</td>";

	echo "</tr>";
	
}


echo "</table>";

	 ?>

</body>
</html>