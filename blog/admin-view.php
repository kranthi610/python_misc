<?php

session_start();



if(!isset($_SESSION['id'])){

    header("Refresh:0 url=index.php");
}
if(isset($_SESSION['id'])){

    echo '<p style="color:green" align="right">'.$_SESSION['id'].'</p>';
//}

//if(isset($_SESSION["id"]))
//{
	
echo "<a href='admin.php'  >Posts</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='logout.php'  >Logout</a> ";


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
        echo "<br><br><a style='text-decoration:none'  href=edit.php?id=$id>"."<font face='verdana' size='5' color='#005A31'>".$row["title"]."</font>"."</a>". "</font>"."<br>".$read."....";//"<a style='text-decoration:none' href=edit.php?id=$id> Edit</a> ";
        echo "<br><br><br>";


        }
} else {
    echo "<br><br>No posts to show";
}



$conn->close();







?>