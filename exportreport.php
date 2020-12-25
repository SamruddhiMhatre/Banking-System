<?php
$servername = "localhost";
$username="root";
$password="";
$dbname="Bank_System";

 mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
 
//connect to mysql database
try{
$conn =mysqli_connect($servername,$username,$password,$dbname);
}catch(MySQLi_Sql_Exception $ex){
echo("error in connecting");
} 
$sql = "SELECT * FROM Customers";  
$result = $conn->query($sql);
?>
<html>  
 <head>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export Data from Customers</h2><br /> 
    <table class="table table-bordered">
    <tr>
    <th>Customer ID</th>
    <th>Customer Name</th>
    <th>Contact</th>
    <th>Address</th>
    <th>Address</th>

     
    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        
          echo "<tr>";
          echo "<td>".$row['Customer_ID']."</td>";
          echo "<td>".$row['Customer_Name']."</td>";
          echo "<td>".$row['Address']."</td>";
          echo "<td>".$row['Contact']."</td>";
          echo "<td>".$row['SSN(Social Service Number)']."</td>";

         
          echo "</tr>";
     }
     ?>
    </table>
    <br />
    <form method="post" action="export1.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    
    </form>
   </div>  
  </div>  
 </body>  
</html>