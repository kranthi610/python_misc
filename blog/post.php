
<?php



session_start();

if(isset($_SESSION["id"]))

{
echo " <p align='right'><a href='logout.php'>   Logout</a> </p>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<h4 align="right" style="color:green";>'.$_SESSION["id"].'</h4>' ;
    
}

if(isset($_SESSION["user"]))

{
echo " <p align='right'><a href='logout.php'>   Logout</a> </p>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<h4 align="right" style="color:green";>'.$_SESSION["user"].'</h4>' ;
    
}


  echo " <p  align='center'><a  style='text-decoration:none' href='index.php'> <font color='green'size='5'><b>News Feed </b></font ></a> </p><br><br>";


if(isset($_POST['commentsubmit']))
{
if(!empty($_POST['comments']))

{
    //if(isset($_SESSION['id']))

       //echo $_SESSION['id'].'<br>';


$comment=$_POST['comments'];
$date=date("Y-m-d H:i:s");
include('connections.php');
if(isset($_SESSION["user"]) ) {
    $user=$_SESSION["user"];
    
    $pid=$_POST['pid'];
$sql = "INSERT INTO comments (pid,comment,user,reg_date)
VALUES ('$pid','$comment','$user','$date')";

if ($conn->query($sql) === TRUE) {
    


}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

else if(isset($_SESSION["id"]) ) {


    $user=$_SESSION["id"];
    $pid=$_POST['pid'];
$sql = "INSERT INTO comments (pid,comment,user,reg_date)
VALUES ('$pid','$comment','$user','$date')";

if ($conn->query($sql) === TRUE) {
    


}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
else
{
    echo 'please <a style=" color:green ;text-decoration:none" href="login.php">Login</a> or <a style="color:green ; text-decoration:none" href="register.php">register </a> to comment<br>';
}




$conn->close();

}
else

{
    echo 'comments cant be empty
    <br>';
}
    
}


?>



<?php



if(!empty($_GET['id']))
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

$postid=$_GET['id'];

$sql = " SELECT * FROM posts WHERE id=$postid ";

//ql="SELECT a.title, a.content, b.image FROM posts a LEFT JOIN images b ON  a.title = b.title  WHERE  a.id='$postid'";
$imagetitle='';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	//#D9853B
         $title=$row["title"];
         $content=$row["content"];
         $imagetitle= $imagetitle.$row["title"];
        $reg_date=$row["reg_date"];
        
        echo "<font color='#D9853B' size='4'>".nl2br($title,true)."</font> <br>$reg_date<br> <br>";
           
         echo "<font color='#D9853B' size='4'>".nl2br($content,true)."</font><br> <br>";
          

       
    }


$sql1 = " SELECT * FROM images WHERE title='$imagetitle' ";

$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
        //#D9853B
         
           $img=$row["image"];
            
         echo "<img src='$img' width='200' height=200 >";


       
    }} 



//if(isset($_SESSION["user"]) || isset($_SESSION["id"]))
//{

$sql2 = "SELECT * FROM comments WHERE pid=$postid";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    // output data of each row
    while($row = $result2->fetch_assoc()) {
        echo '<br><br>'.$row["user"].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row["reg_date"].'<br>';
        echo $row["comment"].'<br>';
    }

}

    
 else {
    echo "<br><br>No Comments";
}

echo "<form  method='POST' action=''>
<input type='hidden' value='$postid' name='pid'>
<p> <label>Comments:</label> <br> 
    <textarea name='comments' style='resize: none' cols='60' rows='3'></textarea>
</p>
<p><input type='submit' name='commentsubmit' value='comment'></p>

</form>";


} else {
    echo "No posts to display";
     header("Refresh:1;url=index.php");

}


$conn->close();




}


?>


