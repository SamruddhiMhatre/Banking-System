<html>
<body>
<center>
<h2>DELETE ENTRY</h2>

<form method = "POST">
Customer ID: <input type = "text" name = "id"><br><br>
<input type = "submit" name="Delete">
</form>
</center>
</body>
</html>

<?php

if (isset($_POST['Delete']))
{
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Bank_System";
	$connect = mysqli_connect($hostname,$username,$password,$dbname);
	$Customer_ID = $_POST['id'];

	$query1 = "delete from Customers where Customer_ID = $Customer_ID ";
	$result = mysqli_query($connect,$query1);

	if($result)
	{
		echo "Data is deleted!";
	}

	else
		{
		echo "Data is not deleted!";
	}
	mysqli_close($connect);

}
?>