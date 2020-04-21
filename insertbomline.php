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
<h2 align="center" style="width: 100%;">Test Page</h2>
<br/>


<br/>
<br/>
<div>

<?php 


$parentno = $_GET['assno'];
$childno = $_GET['partnum'];
$qty = $_GET['qty'];

if ($parentno == $childno)
{
    echo "Error!!  Part want not added. The part to be added cannot be the same as the assembly. <br/>";
        echo "<a href='./createbom.php?assno=" . $parentno . "'>Return</a><br/>";
}else
{

    if (createBillOfMaterial($parentno, $childno, $qty, $servername, $username, $password, $dbname) == 1)
    {
        echo "Success, You have added " . $childno . " to aassembly " . $parentno . " at a quanity of " . $qty . "<br/>";
        echo "<a href='./createbom.php?assno=" . $parentno . "'>Return</a><br/>";
    }else
    {
        echo "Error!!  Part want not added <br/>";
        echo "<a href='./createbom.php?assno=" . $parentno . "'>Return</a><br/>";
    }


}

?>


</div>






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
