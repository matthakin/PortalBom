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




<h2 align="center" style="width: 100%;">Under Construction</h2>
<br/>

<form action="/insertpartnumber.php" method='GET'>
  <label for="partnumber">Part Number:</label><br>
  <input type="text" id="partnumber" name="partnumber" value="Enter Part Number"><br>
  <label for="lname">Description:</label><br>
  <input type="text" id="description" name="discription" value="Enter Description"><br><br>
  <input type="submit" value="Submit">
</form>







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
