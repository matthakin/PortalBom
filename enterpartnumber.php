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

<body style="font-family: Arial; padding: 10px; background: #f1f1f1; align: center" >

<?php include $file_root.'includes/new_header.php'; ?>
<a href="./bomhome.php">BOM app Home</a> <br/>



<h2 align="center" style="width: 100%;">Enter a new Part Number Here.</h2>
<br/>
<div align="center">
<form action="./insertpartnumber.php" method='GET'>
  <label for="partnumber">Part Number:</label><br>
  <input type="text" id="partnumber" name="partnumber" value="" required><br>
  <label for="lname">Description:</label><br>
  <input type="text" size="100" id="description" name="description" value="" required><br>

  <label for="note">Note:</label><br>
  <input type="text" size="100" id="note" name="note" value="">
        <br/>
        <br/>


  <label for="uom">Select Unit of Measure:</label><br>
  <input list="uom" size="10" style="font-size: 18px;" name = "uom">
  <datalist id='uom'>
  <option value="ea">
  <option value="ft">
  <option value="in">
  <option value="fl">
  <option value="gal">
  <option value="roll">
  <option value="M">
  <option value="mm">
  <option value="qt">
  <option value="lb">
  <option value="kg">
  </datalist>

<br/>
<br/>






  <label for="type">Select the part type:</label><br>
  <label for="Standard_Part">Part</label>
  <input type="radio" id="part" name="type" value="Standard_Part"  checked><br>
  <label for="Assembly">Assembly</label>
  <input type="radio" id="assembly" name="type" value="Assembly"><br>
  <label for="Weldment">Weldment</label>
  <input type="radio" id="Weldment" name="type" value="Weldment"><br>
<br/><br/><br/>
  <label for="status">Select the part type:</label><br>
  <label for="Active">Active</label>
  <input type="radio" id="active" name="status" value="Active" checked><br>
  <label for="Not_Active">Not Active</label>
  <input type="radio" id="notactive" name="status" value="Not_Active"><br>
  <input type="submit" value="Submit">
</form>
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
