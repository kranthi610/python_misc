<?php
session_start();

if( isset($_POST['sub']) and !empty($_POST['fname']) and !empty($_POST['pass'])  )


{

	$user=$_POST['fname'];
	$pass=$_POST['pass'];
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

$sql="SELECT name,user,pass FROM members WHERE user='$user' AND pass='$pass' ";

$result = $conn->query($sql);

if($result->num_rows>0)
{
$row = $result->fetch_assoc();

if($row["user"]==='kranthi610@gmail.com' and $row["pass"]==='hanumans123@')
{
	$_SESSION["id"]=$row["name"];
header("Refresh:0;url=admin-view.php");
}

else{
	$_SESSION["user"]=$row["name"];
header("Refresh:0;url=index.php");


}



}

else{

	echo 'wrong credentails';
	header("Refresh:1;url=login.php");
}

}

else{

	echo 'wrong credentials';
header("Refresh:1;url=login.php");
}


?>