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
<h2 align="center" style="width: 100%;">Engineering Bill of Material</h2>
<br/>
<?php //echo 'Part Info ' . getPartInfo('Z-137425', $servername, $username, $password, $dbname) . '<br/>'; ?>

<br/>
<br/>
<div align="center">
<a href="./enterpartnumber.php">Enter Part Number</a> <br/>
<a href="./viewpartnumbersy.php">View Part Number Listing</a> <br/>
<a href="./viewBom.php">View BOM</a> <br/>
<a href="./createbom.php">Create/Edit BOM</a> <br/>
<a href="./editpart.php">Edit Part</a> <br/>
</div>

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
