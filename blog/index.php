<?php

session_start();
if(isset($_SESSION["id"]))
{
	
echo "<a href='admin.php'  >Posts</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'  >Logout</a> ";
echo '<h4 align="right" style="color:green";>'.$_SESSION["id"].'</h4>' ;
echo "<br> <br>";

}
if(isset($_SESSION["user"]))
{

echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'  >Logout</a> <br> <br>";
echo '<h4 align="right" style="color:green";>'.$_SESSION["user"].'</h4>' ;

}
if(!isset($_SESSION["user"]) and !isset($_SESSION["id"]) )
{

	echo '<a href="login.php"> Login </a> &nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<a href="register.php"> Signup </a> <br><br>';
}


	$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = " SELECT * FROM posts ORDER BY id desc";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	
    	$id=$row["id"];
    	$read=substr($row["content"],0,200);
        echo "<a style='text-decoration:none'  href=post.php?id=$id>"."<font face='verdana' size='5' color='#005A31'>".$row["title"]."</font>"."</a>". "</font>"."<br>".$read."...."."<a style='text-decoration:none' href=post.php?id=$id> Read More </a> ";
        echo "<br><br><br>";


        }
} else {
    echo "No posts to show";
}

$conn->close();

?>