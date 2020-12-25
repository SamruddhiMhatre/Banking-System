<style >
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
  
body {
   background-image: url("customer.jpg");
   background-repeat: no-repeat;
   background-position: center;
   background-size: cover;
}

</style>


<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "Bank_System";

include "conn.php";
// Create connection


$connect = new mysqli($hostname, $username, $password, $dbname);

if ($connect->connect_error)
{
	die("Connection Failed: " . $connect->connect_error);
}

 $Customer_ID = $_POST['Customer_ID'];
        

$sql = "SELECT Customer_ID, Customer_Name, Branch_ID, Address, Contact from Customers
where Customer_ID = '$Customer_ID' ";

    mysqli_select_db($connect,$dbname);
            $result = mysqli_query($connect,$sql);


if ($result)
{
	echo " <table>
	<tr>
	<th>Customer_ID</th>
	<th>Customer_Name</th>
	<th>Branch_ID</th>
	<th>Address</th>
	<th>Contact</th>
	
	</tr>";

	while ($row = $result->fetch_assoc()) {
		echo "<tr>
		<td>".$row["Customer_ID"]."</td>
		<td>".$row["Customer_Name"]."</td>
		<td>".$row["Branch_ID"]."</td>
		<td>".$row["Address"]."</td>
		<td>".$row["Contact"]."</td>
		
		</tr>" ;
	}
	echo "</table>";
}

else 
{
	echo "0 results";
}

include "login1.php";

$connect->close();
?>