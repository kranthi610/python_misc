
<?php


session_start();
if(!isset($_SESSION['id'])){

    header("Refresh:0 url=index.php");
}

if(isset($_SESSION["id"]))

{
echo " <p align='right'><a href='logout.php'>   Logout</a> </p>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<h4 align="right" style="color:green";>'.$_SESSION["id"].'</h4>' ;
    
}



  echo " <p  align='center'><a  style='text-decoration:none' href='admin-view.php'> <font color='green'size='5'><b>News Feed </b></font ></a> </p><br><br>";



  
if(isset($_POST['edit']) )
{
if(!empty($_POST['id']))
{

$eid=$_POST['id'];
   
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
 $sql = " SELECT * FROM posts WHERE id=$eid ";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
$row = $result->fetch_assoc();
$title=$row["title"];
$content=$row["content"];

echo "<br><br>
<form action='' method='POST'>

 
<input type='hidden' value='$eid' name='postid'>
<p> <label>Title</label> <br> 
    <input type='text' value='$title' name='posttitle'> 
</p>
    
    <p> <label>Content</label> <br> 
    <textarea  name='postcontent' style='resize: none' cols='60' rows='20'>
$content
    </textarea>
</p>
    <p><input type='submit' name='editsubmit' value='Post'></p>

</form>";

}

else
{

    echo 'no posts to show';
    header('Refresh:1;url=admin-view.php');
}




$conn->close();


}
}



?>




<?php


if(isset($_POST['editsubmit']))
{

if(!empty($_POST['postcontent']) and !empty($_POST['posttitle']) and !empty($_POST['postid']))
{

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

$postid=mysqli_real_escape_string($conn,$_POST['postid']);
$newtitle=mysqli_real_escape_string($conn,$_POST['posttitle']);
$newcontent=mysqli_real_escape_string($conn,$_POST['postcontent']);

$sql = "UPDATE posts SET title='$newtitle',content='$newcontent' WHERE id=$postid";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
    header("Refresh:1;url=admin-view.php");
} 
else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

}

else

{

echo 'form empty';
header("Refresh:1;url=admin-view.php");


}



}

?> 