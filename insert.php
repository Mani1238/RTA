
<?php
	$username = $_POST["username"];
	$emailid = $_POST["emailid"];
	$password = $_POST["password"];
	$phone= $_POST["phone"];
    if (!empty($username) || !empty($emailid) || !empty($password) || !empty($phone) ) 
    {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "rta";
    
        //create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error())
        {
            die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } 
        else
        {
            $SELECT = "SELECT emailid from users where emailid = ? Limit 1";
            $INSERT = "INSERT Into users(username,emailid,password,phone) values(?, ?, ?, ?)";
                //Prepare statement
                $stmt = $conn->prepare($SELECT);
                $stmt->bind_param("s",$emailid);
                $stmt->execute();
                $stmt->bind_result($emailid);
            
                $stmt->store_result();
                $rnum = $stmt->num_rows;
                if($rnum==0)
                {
                        $stmt->close();
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("sssi", $username, $emailid, $password, $phone);
                        $stmt->execute();
                        echo "New record inserted sucessfully";
                        echo "<a href='main.html'>home</a>";
                } 
                else 
                {
                        echo "Someone already register using this email";
                }
                $stmt->close();
                $conn->close();
        }
 }
 else 
 {
 echo "All field are required";
 die();
}
?>
