<html>
<head>
   
    <link rel="stylesheet" type="text/css" href="style1.css"></head>
  <body>   

    <form action="" method="post" >
        <center><h1>ENTER VEHICLE REGISTERATION NUMBER</h1></center>
     
  <input  type="text" name='regno' >
         <input type="submit" name='search' ></form>
       
        
        


<table border="1">          
<tr>
<th>REG_NO</th>
<th>FUEL_TYPE</th>
<th>OWNER_NAME</th>
    <th>VEHICLE_NAME</th>

<th>TAX_AMOUNT</th>
    <th>TAX_PAID_DATE</th>
<th>DATE_OF_REG</th>
<th>REG_AUTHORITY</th>
   
<th>VEHICLE_CLASS</th>

    <th>STATUS</th>
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
$sql = "SELECT REG_NO,FUEL_TYPE,OWNER_NAME,VEHICLE_NAME,TAX_AMOUNT,TAX_PAID_DATE,DATE_OF_REG,REG_AUTHORITY,VEHICLE_CLASS,STATUS FROM data where REG_NO='$regno'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>" . $row["REG_NO"]. "</td><td>" . $row["FUEL_TYPE"] . "</td><td>". $row["OWNER_NAME"] . "</td><td>". $row["VEHICLE_NAME"] .  "</td><td>". $row["TAX_AMOUNT"] . "</td><td>". $row["TAX_PAID_DATE"] . "</td><td>". $row["DATE_OF_REG"] . "</td><td>". $row["REG_AUTHORITY"] . "</td><td>". $row["VEHICLE_CLASS"] . "</td><td>".$row["STATUS"]. "</td></tr>";
} 
echo "</table>";
}else { echo "0 results"; }

$conn->close();
}
?>
</table>
       </body>
    </html>