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

<form action="./insertpartnumber.php" method='GET'>
  <label for="partnumber">Part Number:</label><br>
  <input type="text" id="partnumber" name="partnumber" value="" required><br>
  <label for="lname">Description:</label><br>
  <input type="text" id="description" name="description" value="" required><br>

  <label for="note">Note:</label><br>
  <input type="text" id="note" name="note" value=""><br>


<br/><br/><br/>

  <label for="uom">Select the unit of measure:</label><br>
  <label for="ea">ea</label>
  <input type="radio" id="ea" name="uom" value="ea"  checked><br>
  <label for="ft">ft</label>
  <input type="radio" id="ft" name="uom" value="ft"><br>
  <label for="in">in</label>
  <input type="radio" id="in" name="uom" value="in"><br>
  <label for="fl">fl</label>
  <input type="radio" id="fl" name="uom" value="fl"><br>

  <label for="gal">gal</label>
  <input type="radio" id="gal" name="uom" value="gal"><br>

  <label for="roll">roll</label>
  <input type="radio" id="roll" name="uom" value="roll"><br>

  <label for="fl">fl</label>
  <input type="radio" id="fl" name="uom" value="fl"><br>

  <label for="M">M</label>
  <input type="radio" id="M" name="uom" value="M"><br>

  <label for="mm">mm</label>
  <input type="radio" id="mm" name="uom" value="mm"><br>

  <label for="qt">qt</label>
  <input type="radio" id="qt" name="uom" value="qt"><br>

  <label for="ib">lb</label>
  <input type="radio" id="lb" name="uom" value="lb"><br>

  <label for="kg">kg</label>
  <input type="radio" id="kg" name="uom" value="kg"><br>
<br/><br/><br/>







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
