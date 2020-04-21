<?php
$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";




//Edit Check
include $file_root.'includes/session_user_edit_check.php';
include $file_root.'includes/sql_connect.php';
$permissible_page = "sense"; 
include $file_root.'bom/bom.php';
$partnum = "";
if (isset($_GET['partnum'])) { $partnum = $_GET['partnum']; }


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
<h2 align="center" style="width: 100%;">Edit Part</h2>
<br/>

<?php if ($partnum == "") { 
    
    $tempstr = getlistofPartNumbers($servername, $username, $password, $dbname);

    $numbs = array();
    $numbs = explode('|', $tempstr);
    
    
    
    ?>

<div align="center">
<form action="./editpart.php" method = 'GET'>

Search For a Part Number:<br>
<input list="partnum" size="25" style="font-size: 18px;" name = "partnum">
<datalist id='partnum' >
  <?php
  
  for ($i = 0;$i < count($numbs) - 1; $i++)
  {
      echo "<option value=" . $numbs[$i] . ">";
  }

  ?>
</datalist>
</form>


<?php } else { ?>




<?php } ?>
<br/>
<br/>
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
