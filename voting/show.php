<?php
	 session_start()
	 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
		 		if(isset($_SESSION['uid']))
		 		{
					$server = "localhost";
				 $username = "root";
				 $password= "";
				 $database = "vote";
				 $conn = mysqli_connect($server, $username, $password, $database);
				 if (!$conn) {
					 die("connection failed:".mysqli_connect_error());
				 }
				 $sql ="SELECT * FROM `abstract`";
				 $run = mysqli_query($conn,$sql);
				 echo "<table>";
				 while ($row = mysqli_fetch_array($run)) {
						echo "<tr>";
						echo "<td>";?>
						<form  method="post" action="vote.php">
							<h1 name= "h1" value="as"> <?php echo $row["project_name"];?> </h1>
							 <p> <?php echo $row["details"];?> </p>
							 <input type="hidden" name="vote" value="<?php echo $row["team_name"];?>">
							 <input type="hidden" name="vote" value="<?php echo $row["team_name"];?>">
							<input type="submit" name="submit" value="VOTE">
						</form>
						<?php echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
		 		}
				else {
					  echo "<script>setTimeout(\"location = 'index.php';\",0);</script>";
						session_destory();
				}
		 ?>
</body>
</html>
