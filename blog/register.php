<?php
session_start();
if(isset($_SESSION["id"]) || isset($_SESSION["user"]))

{

echo 'you are already registered';
header("Refresh:1;url=index.php");

}

else{


echo '<form action="" method="POST">
           <br>
           Name: <input type="text" name="fname"><br><br>
           Email:<input type="email" name="email"><br><br>
	Password:<input type="password" name="pass"><br><br>

<input type="Submit" name="reg">
<input type="Reset" value="Clear">
</form>';




if( isset($_POST['reg']) and !empty($_POST['fname']) and !empty($_POST['email']) and !empty($_POST['pass']) )


{

	$user=$_POST['fname'];
	$pass=$_POST['pass'];
	$email=$_POST['email'];
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
$user=mysqli_real_escape_string($conn,$user);
$email=mysqli_real_escape_string($conn,$email);
$pass=mysqli_real_escape_string($conn,$pass);
$sql="SELECT user FROM members WHERE user='$email'";

$result = $conn->query($sql);

if($result->num_rows>0)
{
echo 'user already exists';
header("Refresh:1 url=register.php");
}

else
{

	

$sql = "INSERT INTO members(name,user,pass)
VALUES ('$user','$email','$pass' )";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
    header("Refresh:1;url=index.php");

} else {
    echo "Error: ".$conn->error ;
}
}

$conn->close();




}


}

?>