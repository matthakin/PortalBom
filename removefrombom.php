<?php
$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";




//Edit Check
include $file_root.'includes/session_user_edit_check.php';
include $file_root.'includes/sql_connect.php';
$permissible_page = "sense"; 
include $file_root.'bom/bom.php';
$assno  = "";
$childno = "";
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
<h2 align="center" style="width: 100%;">Remove Item From bom</h2>
<br/>


<br/>
<br/>

<?php

if (isset($_GET['childno'])) { $childno = $_GET['childno'];  }
if (isset($_GET['assno'])) { $assno = $_GET['assno'];}


if ($childno != "" && $assno != ""){
 echo removePartFromBOM($assno, $childno, $servername, $username, $password, $dbname) . "<br/>";

 echo "Success, You have deleted " . $childno . " from aassembly " . $assno . "<br/>";
 echo "<a href='./createbom.php?assno=" . $assno . "'>Return</a><br/>";

}else
{
    echo "Error!!  Part want not deleted <br/>";
    echo "<a href='./createbom.php?assno=" . $assno . "'>Return</a><br/>";
}



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
