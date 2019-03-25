<?php
session_start();
      if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
      {
       if(!isset($_SESSION['uid']))
            echo "<script>setTimeout(\"location = 'show.php';\",0);</script>";
        $voteFor =  $_POST['vote'];
        $voteBy = 	$_SESSION['uid'];
        $server = "localhost";
        $username = "root";
        $password= "";
        $database = "vote";
        $conn = mysqli_connect($server, $username, $password, $database);
   		 if (!$conn) {
   			 die("connection failed:".mysqli_connect_error());
   		 }
        $query = "SELECT * FROM user WHERE username ='$voteBy'";
        $run = mysqli_query($conn,$query);
        $row = mysqli_fetch_assoc($run);
        //echo $row['vote'] ;
       if($row['vote'] == 1){
          echo '<script language="javascript">';
          echo 'alert("You have already voted!")';
          echo '</script>';
          echo "<script>setTimeout(\"location = 'show.php';\",0);</script>";
       }
       else{
           $sql = "UPDATE user SET vote = 1 WHERE username = '$voteBy'";
           if (mysqli_query($conn, $sql))
           echo "";
           else
           echo "Error" . mysqli_error($conn);
           $sql = "UPDATE abstract SET votes = votes  + 1 WHERE team_name = '$voteFor'";
              if (mysqli_query($conn, $sql))
                {
                  echo '<script language="javascript">';
                  echo 'alert("successfully Voted!")';
                  echo '</script>';
                  echo "<script>setTimeout(\"location = 'show.php';\",0);</script>";
                   //echo "Record updated successfully";
                }
             else
             echo "Error" . mysqli_error($conn);
         }
       //echo "vote for ".$voteFor."vote by ".$voteBy;

      }
 ?>
