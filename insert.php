<html>
<body>
<center>
<h2>INSERT ENTRY</h2>

<form method = "POST" name='insert_form'>
Customer ID: <input type = "text" name = "id" /><br><br>
Customer name: <input type = "text" name = "name" /><br><br>
branch id: <input type = "text" name = "bid" /><br><br>
address: <input type = "text" name = "add" /><br><br>
contact: <input type = "text" name = "con" /><br><br>
ssn: <input type = "text" name = "ssn" /><br><br>
<input type = "submit" name="insert" />
</form>
</center>
</body>
</html>

<?php

	include 'conn.php';

if (isset($_REQUEST['insert']))
{
	$Customer_ID = $_REQUEST['id'];
    $Customer_Name = $_REQUEST['name'];
    $Branch_ID = $_REQUEST['bid'];
    $Address = $_REQUEST['add'];
    $Contact = $_REQUEST['con'];
    $SSN = $_REQUEST['ssn'];

	$sql = "insert into Customers values(".$Customer_ID.",'".$Customer_Name."',".$Branch_ID.",'".$Address."',".$Contact.",".$SSN.");";
	echo $sql;
	$result = mysqli_query($conn,$sql);

	if($result){
		echo "Inserted";
	} else {
		die("Error Inserting: ".mysqli_error($conn));
	}	
}

?>