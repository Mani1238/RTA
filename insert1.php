<?php
	$prob = $_POST['prob'];

    if (!empty($prob)  ) 
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
           
            $INSERT = "INSERT into des(prob) values(?)";
                        $stmt = $conn->prepare($INSERT);
                        $stmt->bind_param("s", $prob);
                        $stmt->execute();
                        echo "New record inserted sucessfully";
                      //  echo "<a href='ri.html'>home</a>";
               
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