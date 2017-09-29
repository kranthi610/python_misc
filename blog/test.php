

<html>
<form action='' method='POST' enctype="multipart/form-data">

<input type="file" name="fileToUpload[]" multiple >


    <p><input type='submit' name='submit' value='Post'></p>

</form>
 </html>
<?php

//if(isset($_FILES['fileToUpload']))
if(isset($_POST['submit']))
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
$target_dir = "images/";

$posttitle='abc';
if(!empty($_FILES['fileToUpload']['name'][0]))
 {

for($i=0;$i<count($_FILES['fileToUpload']['name']);$i++){
$target_file = $target_dir . $_FILES["fileToUpload"]["name"][$i];
//=$target_dir . $_FILES["fileToUpload"]["name"][$i];


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    }
else{

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
        
        echo 'moved';
    } else {
        die("Sorry, there was an error uploading your file.");
    }

	}


$sql2 = "INSERT INTO images (image,title)
VALUES ('$target_file','$posttitle')";

if ($conn->query($sql2) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql2 . "<br>" . $conn->error;
}



	}

	}

	else {

		echo 'no images';
	}

}




?>