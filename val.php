<?php
$emailid=$_POST['emailid'];
$password=$_POST['password'];
$host= "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "rta";
  
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
/*mysql_connect('localhost','root','');
mysql_select_db('project');*/

$result=mysqli_query($conn,"select * from users where emailid='$emailid' and password='$password'");
//or die("unable to ".mysql_error());
$row=mysqli_fetch_array($result);
if($row['emailid'] == $emailid && $row['password'] == $password)
{
//echo "logged in";
header('location:http://localhost/projecttt/button.html');
}
else
{
  echo "invalid username or password.PLEASE TRY AGAIN";
   // echo "<script type='text/javascript'>alert('INVALID USERMAIL OR PASSWORD PLEASE TRY AGAIN');</script>";
}

?>