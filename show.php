<style>
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

include "show1.php";
include "show2.php";
include "show3.php";

$connection = new mysqli($hostname, $username, $password, $dbname);

if ($connection->connect_error)
{
	die("Connection Failed: " . $connection->connect_error);
}

$sql = "SELECT Customer_ID, Customer_Name, Branch_ID, Address, Contact from Customers";
$result = $connection->query($sql);

if ($result)
{
	echo " <table>
	<tr>
	<th>Customer_ID</th>
	<th>Customer_Name</th>
	<th>Branch_ID</th>
	<th>Address</th>
	<th>Contact</th>
<br>	
	</tr>";

	while ($row = $result->fetch_assoc()) {
		echo "<tr>
		<td>".$row["Customer_ID"]."</td>
		<td>".$row["Customer_Name"]."</td>
		<td>".$row["Branch_ID"]."</td>
		<td>".$row["Address"]."</td>
		<td>".$row["Contact"]."</td>
		
		</tr>";
	}
	echo "</table>";
}

else 
{
	echo "0 results";
}

$connection->close();
?>