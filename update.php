<html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
   </head>
   
   <body>
      <?php
include 'conn.php';

         if(isset($_POST['update'])) {
            $dbhost = 'localhost';
            $username = 'root';
            $password = '';
            $dbname ='Bank_System';
            
            $connect = mysqli_connect($hostname,$username,$password,$dbname);
            
            if(! $conn ) {
               die('Could not connect: ' . mysqli_error());
            }
            
            $Customer_ID = $_POST['Customer_ID'];
            $Customer_Name = $_POST['Customer_Name'];
            $Branch_ID = $_POST['Branch_ID'];
            $Contact = $_POST['Contact'];
            $Address = $_POST['Address'];
            
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
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                     <tr>
                        <td width = "100">customer ID</td>
                        <td><input type = "number" name = "Customer_ID" 
                           id = "Customer_ID"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">address</td>
                        <td><input type="text" name="Address" id = "Address">
                     </tr>

                     <tr>
                     	<td>Name</td>
                     	<td><input type="text" name="Customer_Name" id = "Customer_Name"></td>

                     </tr>

                     <tr>
                     	<td>Branch ID</td>
                     	<td><input type="number" name="Branch_ID" id = "Branch_ID"></td>
                     </tr>

                  <tr>
                     	<td>Contact</td>
                     	<td><input type="number" name="Contact" id = "Contact"></td>
                     </tr>
                  


                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Update">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>