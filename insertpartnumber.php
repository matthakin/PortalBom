<?php
$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";




//Edit Check
include $file_root.'includes/session_user_edit_check.php';
include $file_root.'includes/sql_connect.php';
$permissible_page = "sense"; 
include $file_root.'bom/bom.php';

$partnumber = $_GET['partnumber'];
$description = $_GET['description'];
$note = $_GET['note'];
$tempstatus = $_GET['status'];
$status = 'yes';
if ($tempstatus == 'Active')
{
    $status = 'yes';
}else
{
    $status = 'no';
}

$temptype = $_GET['type'];
$type = -1;
if ($temptype == 'Weldment')
{
    $type = 2;
}else if ($temptype == 'Standard_Part')
{
    $type = 0;
}else if ($temptype == 'Assembly')
{
    $type = 1;
}

$answer = doesPartExist($servername, $username, $password, $dbname, $partnumber);



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

<?php
if ($answer == -1)
{
    ?><h2 align="center" style="width: 100%;">Part Addition Failed</h2>
<br/> <?php
    echo "Part Has already been used. <br/>";
    echo "Select part other than " . $partnumber . "<br/>";
    echo "Description: " . $description . "<br/>";
    echo "Note: " . $note . "<br/>";
    echo "Type: " . $type . "<br/>";
    echo "Active: " . $status . "<br/>";
}else
{
    
    ?><h2 align="center" style="width: 100%;">Part Addition Confirmed</h2>
<br/> <?php
    echo "Part Number: " . $partnumber . "<br/>";
    echo "Description: " . $description . "<br/>";
    echo "Note: " . $note . "<br/>";
    echo "Type: " . $type . "<br/>";
    echo "Active: " . $status . "<br/>";
    
    addPartToDataBase($partnumber, $description, $type, $note, $servername, $username, $password, $dbname);
}

?>

<br/><br/><br/>










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
