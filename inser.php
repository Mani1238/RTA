
<?php
	$username = $_POST["username"];
	$emailid = $_POST["emailid"];
	$password = $_POST["password"];
	$phone= $_POST["phone"];
    if (!empty($username) && !empty($emailid) && !empty($password) && !empty($phone) ) 
    {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "rta";
    
        //create connection
        $conn = mysqli_connect($host, $dbUsername, $dbPassword, $dbname);
        if (!$conn)
        {
            echo "Error";
        } 
        else
        {
            $sql="select * from users where emailid='$emailid'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
            echo "Someone already register using this email";
            }
            else{
            $sql1 = "INSERT into users values('$username','$emailid','$password','$phone')";
                if(!mysqli_query($conn,$sql1)){
                echo "Not inserted!!Error occured";
                }
                else{
                        echo "New record inserted sucessfully";
                        echo "<a href='main.html'>home</a>";
                } 
                
                $conn->close();
                }
        }
 }
 else 
 {
 echo "All field are required";
}
?>
