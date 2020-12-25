<html>
<head>
	<title>Edit Database</title>
	</head>
	<style>
#main-edit
{
	background-color: white;
	border: 0px solid;
	width: 500px;
	margin: 0 auto;
}

.inner_container
{
	width: 400px;
	margin: 0 auto;
	color:#000080;
	font-size: 20px;
}

input
{
   width: 400px;
   margin: 0 auto;
   padding: 5px;
   border: 1px solid;
}

#insert{
	 background-color: #008CBA; /* Blue */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}

#delete{
	 background-color: #008CBA; /* Blue */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}

#update{
	 background-color: #008CBA; /* Blue */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;

}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #008CBA;
  color: white;
}
.topnav-right {
  float: right;
}

	</style>
}
}
}
}
<body style="background-image: url(Bank.jpg)">

	<div class="topnav">
  <a class="active" href="bank.html">Home</a>
  <a href="#contact">022-65650329</a>
  <div class="topnav-right">
    <a href="show.php">View Database</a>
  <a href="edit.php">Edit Database</a>
    <a href="exportreport.php">Generate Report</a>
  </div>
</div>
<br><br>
<center>

	<div id = "main-edit">
		<center><h2 style="color: 000080;">INSERT /	DELETE	/ UPDATE</h2></center>

		<div class = "inner_container">
			<center><form action="edit.php" method = "post">
				Customer ID: <input type="number" placeholder= "Customer ID" name="cid"><br><br>
				Customer Name: <input type="text" placeholder= "Customer Name" name="cname"><br><br>
				Branch ID: <input type="number" placeholder= "Branch ID" name="bid"><br><br>
				Contact: <input type="number" placeholder= "Enter mobile number" name="con"><br><br>
				Address: <input type="text" placeholder= "Residential Address" name="add"><br><br>
				SSN: <input type="number" placeholder= "Social Service Number" name="ssn"><br><br>
			
			</center>

			<center>
				<button id = "insert" name="insert" type="Submit">Insert</button>
				<button id = "delete" name="delete" type="Submit">Delete</button>
				<button id = "update" name="update" type="Submit">Update</button>
			</center>
			</form>


			<?php

	include 'conn.php';

if (isset($_REQUEST['insert']))
{
	$Customer_ID = $_REQUEST['cid'];
    $Customer_Name = $_REQUEST['cname'];
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





if (isset($_POST['delete']))
{
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "Bank_System";
	$connect = mysqli_connect($hostname,$username,$password,$dbname);
	$Customer_ID = $_POST['cid'];

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

if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $username = 'root';
            $password = '';
            $dbname ='Bank_System';
            
            $connect = mysqli_connect($hostname,$username,$password,$dbname);
            
            $Customer_ID = $_POST['cid'];
            $Customer_Name = $_POST['cname'];
            $Branch_ID = $_POST['bid'];
            $Contact = $_POST['con'];
            $Address = $_POST['add'];
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error());
            }
            
           
            $sql = "UPDATE Customers SET Address = '$Address' , Customer_Name = '$Customer_Name' , Branch_ID = '$Branch_ID' , Contact = '$Contact' 
               WHERE Customer_ID = $Customer_ID" ;
            mysqli_select_db($connect,$dbname);
            $result = mysqli_query($connect,$sql);
            
            if(!$result) {
               die('Could not update data: ' . mysqli_error($connect));
            }
            echo "Updated data successfully\n";
            
            mysqli_close($connect);
        }
            else {
            ?>
               
            <?php
         }

?>
		</div>
	</div>
	</body>
</html>