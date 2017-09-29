<?php
session_start();
if(isset($_SESSION["id"]) || isset($_SESSION["user"]))

{

echo 'you are already logged in';
header("Refresh:1;url=index.php");

}

else{


echo '<form action="loginaction.php" method="POST">
           <br>
           Email: <input type="text" name="fname"><br><br>
Password: <input type="password" name="pass"><br><br>

<input type="Submit" name="sub">
<input type="Reset" value="Clear">
</form>';
}
?>