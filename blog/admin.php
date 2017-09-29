
<?php  


session_start();

if(!isset($_SESSION['id'])){

	header("Refresh:0 url=index.php");
}
if(isset($_SESSION['id'])){

	echo '<p style="color:green" align="right">'.$_SESSION['id'].'</p>';
}



?>
<html>
<body>

<a href='admin-view.php'>	News</a>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href='logout.php'>	Logout</a>
<form action='' method='POST' enctype="multipart/form-data">

    <p><label>Title</label><br>
    <input type='text' name='posttitle' > 
</p>
    
    <p> <label>Content</label> <br> 
    <textarea name='postcontent' style='resize: none' cols='60' rows='20'></textarea>
</p>
<input type="file" name="fileToUpload[]" multiple >
    <p><input type='submit' name='postsubmit' value='Post'></p>

</form>


</body>

</html>


<?php

if(isset($_POST['postsubmit']) and !empty($_POST['postcontent']) and !empty($_POST['posttitle']))
{

$target_dir = "images/";


$postcontent=$_POST['postcontent'];
	$posttitle=$_POST['posttitle'];

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

$posttitle=mysqli_real_escape_string($conn,$posttitle);
$postcontent=mysqli_real_escape_string($conn,$postcontent);

$today=date('Y-m-d H:i:s');

if(!empty($_FILES['fileToUpload']['name'][0])){
for($i=0;$i<count($_FILES['fileToUpload']['name']);$i++)
{
$target_file = $target_dir . $_FILES["fileToUpload"]["name"][$i];
//=$target_dir . $_FILES["fileToUpload"]["name"][$i];

if (file_exists($target_file)) {
    die( "Sorry, file already exists.Choose different name for your files and re-try posting");
    }
else{
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
        
        
    } 

    else {
        die( "Sorry, there was an error uploading your file.");
    }

    
    

$sql2 = "INSERT INTO images (image,title)
VALUES ('$target_file','$posttitle')";

if ($conn->query($sql2) === TRUE) {
    
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}}

}
}






$sql = "INSERT INTO posts(title,content,reg_date)
VALUES ('$posttitle','$postcontent','$today' )";

if ($conn->query($sql) === TRUE) {
    echo "New post created successfully";
    //header("Refresh:1;url=admin.php");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}











$conn->close();




}











?>



