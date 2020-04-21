<?php
$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";




//Edit Check
include $file_root.'includes/session_user_edit_check.php';
include $file_root.'includes/sql_connect.php';
$permissible_page = "sense"; 
include $file_root.'bom/bom.php';
$assno = "";
$asdec = "";
if (isset($_GET['assno'])){ $assno = $_GET['assno'];}

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
<h2 align="center" style="width: 100%;">View BOM</h2>
<br/>

<?php if ($assno == "") {?>

<form action="./viewBom.php" method = 'GET'>
  <label for="assno">Assembly Number:</label><br>
  <input type="text" id="assno" name="assno" value=""><br>
  <input type="submit" value="Submit">
</form> 
<br/>


<?php } else {?>
    <table border="2" cellpadding="5" cellspacing="0" align="center">
    <tr><th>Part Number</th><th>Description</th><th>QTY</th><th>Type</th><th>Drawing</th></tr>
<?php
echo "<tr bgcolor='GRAY'><td><b>" . $assno . "</b></td><td><b>" . getPartDescription($assno, $servername, $username, $password, $dbname) . "</b></td><td>00</td><td>ASSEMBLY</td><td><a href='#'>Draw</a></td></tr>";

$bom = getBOM($assno, $servername, $username, $password, $dbname); 
$lines = array();
$lines = explode('@',$bom);

for ($i = 0; $i < count($lines) - 1; $i++)
{

    $parts = array();

$parts = explode('|',$lines[$i]);

if ($parts[3] == "ASSEMBLY")
{
    $partassembly = $parts[0];
    Echo "<tr><td><a href='viewBom.php?assno=" . $partassembly . "'>$partassembly</a></td><td>" . $parts[1] . "</td><td>" . $parts[2] . "</td><td>" . $parts[3] . "</td><td><a href='#'>Draw</a></td></tr>";
}else
{
    Echo "<tr><td>" . $parts[0] . "</td><td>" . $parts[1] . "</td><td>" . $parts[2] . "</td><td>" . $parts[3] . "</td><td><a href='#'>Draw</a></td></tr>";
}




}


echo "</table>";

?>



<?php } ?>

<br/>
<br/>


<?php 



?>









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
