
<?php
session_start();
$host="localhost";
$username="root";
$password="";
$db="Bank_System";
 
$connect=mysqli_connect($host,$username,$password,$db);
if(!$connect){
	die("Database connection error");
}

 class ExcelCSVGenerator
{

public static function generateFile($username,$password,$db, $table,$query) {


$connect = mysql_connect("localhost", $username, $password);
mysql_select_db($db,$connect);
mysql_query("SET CHARACTER SET utf8");
mysql_query("SET NAMES 'utf8'");
mysql_query ("set collation_connection='latin1_swedish_ci'"); 
//create a file on the fly
$file=fopen("php://output", "w");
//tell browser about the file
header("content-type: text/csv;charset=UTF-8");
header('Content-Disposition: attachment; filename=ExReport.csv');
//add byte order mark to the beginning of the file
//so Ms. Excel can view the file properly
fwrite($file,"\xEF\xBB\xBF");
//Write column names
$result = mysql_query("show columns from $table",$connect);
$num_cols=mysql_num_rows($result);
for ($i = 0; $i < $num_cols; $i++) {
$col_array[$i] = mysql_fetch_assoc($result);
$field_array[$i] = strtoupper($col_array[$i]['Field']);
}
fputcsv($file,$field_array);

//Write data rows
$result = mysql_query($query,$connect);
for ($i = 0; $i < mysql_num_rows($result); $i++) {
$dataArray[$i] = mysql_fetch_assoc($result);
}


foreach ($dataArray as $line) {
fputcsv($file,$line);


}


fclose($file);
}
}


 
?>