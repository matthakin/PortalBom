<?php
$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";




//Edit Check
include $file_root.'includes/session_user_edit_check.php';
include $file_root.'includes/sql_connect.php';
$permissible_page = "sense"; 
include $file_root.'bom/bom.php';
?>
<!DOCTYPE HTML>
<html>
<head>
        <link rel="stylesheet" href="../styles/bootstrap.min.css">
        <link rel="stylesheet" href="styles/table.css">
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
<style>
        body {
        font-family: Arial;
        padding: 10px;
        background: #f1f1f1;
        }
</style>
</head>

<body style="font-family: Arial; padding: 10px; background: #f1f1f1;">

<?php include $file_root.'includes/new_header.php'; ?>
<a href="./bomhome.php">BOM app Home</a> <br/>
<h2 align="center" style="width: 100%;">Part Number List</h2>
<br/>


<br/>
<br/>


<?php 

// Create connection
$conn2 = new mysqli($servername, $username, $password, $dbname);
//Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}
// SQL
$sql = "SELECT * FROM part ORDER BY partnumber";
$result = $conn2->query($sql);
$num_rows = mysqli_num_rows($result);
?>
<table border="2" cellpadding="5" cellspacing="0" align="center">
<tr bgcolor='GRAY'><th>Part Number</th><th>Description</th><th>uom</th><th>Draw</th><th>Edit</th></tr>
<?php
while($row = $result->fetch_assoc())
{

  echo "<tr><td>" . $row['partnumber'] . "</td><td>" . $row['description'] . "</td><td>" . $row['uom'] . "</td><td><a href='#'>Draw</a></td><td><a href='#'>EDIT</a></td></tr>";

   
   // echo $row['partnumber'] . "\t\t" . $row['description'] . "\t\t" . $row['uom'] . "<br/>";
}
?>

</table>

<br/>
<br/>






<div class="row">

    <div class="leftcolumn">
        <div class="card" > 
        </div>
    </div>

    <div class="rightcolumn">
        <div class="card">
        </div>
    </div>


</div>


<?php include $file_root.'includes/foot.php'; ?>

</body>
</html>
