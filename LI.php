<html>
<head>
   
    <link rel="stylesheet" type="text/css" href="style1.css"></head>
  <body>   

    <form action="" method="post" >
        <center><h1>ENTER DRIVER LICENCE NUMBER</h1>
     
  <input  type="text" name="regno">
         <input type="submit"  name="search">
            
            </form>
    


<table border="1">          
<tr>
<th>DL_NUM</th>
<th>NAME</th>
<th>S-O/D-O/W-O</th>
    <th>CLASS_OF_VEHICLE</th>

<th>ISSUED_DATE</th>
    <th>ADDRESS</th>

    </tr>
      
    
<?php
$conn = mysqli_connect("localhost", "root","", "rta");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST['search']))
{
    $regno=$_POST['regno'];
$sql = "SELECT * FROM ldetails where DL_NUM='$regno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["DL_NUM"]. "</td><td>" . $row["NAME"] . "</td><td>". $row["S-O/D-O/W-O"] . "</td><td>". $row["CLASS_OF_VEHICLES"] .  "</td><td>". $row["ISSUED_DATE"] . "</td><td>". $row["ADDRESS"] . "</td></tr>";
}
echo "</table>";
}else { echo "0 results"; }

$conn->close();
}

?>
</table>
       </body>
    </html>