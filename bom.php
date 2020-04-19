<?php 
/* 
Author:         Matthew Hakin
Company:        Triverus llc
Date:           19 April 2020

*************************************************************************************
*************************************************************************************
*************************************************************************************
*************************************************************************************

This is a collection of functions to create an manage a simple
bom database. It is a central location where the engineering department
and the navy can access the current bom configuration. 
This Will be on the web portal. runs with 

*************************************************************************************
*************************************************************************************
*************************************************************************************
*************************************************************************************
*/

$file_root = $_SERVER['DOCUMENT_ROOT']."/intranet/";
include_once $file_root.'includes/sql_connect.php';

// Function to see if a part exits in the database
function doesPartExist($servername, $username, $password, $dbname, $num)
{
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $output = -1;
    //Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM part WHERE partnumber = '" . $num . "';";
    $result = $conn->query($sql);

    // Part exits
    if ($result->num_rows > 0)
    {
        $output = 1;
    }
    $conn->close();
    return $output;
}

// Add a new part to the database
function addPartToDataBase($pnum, $desc, $type, $note, $servername, $username, $password, $dbname)
{
    // Make sure part doesn't already exisy
    if (doesPartExist($servername, $username, $password, $dbname, $pnum) == 1)
    {
        return "Part already exits. <br/>";
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO `part` (`partid`, `type`, `partnumber`, `description`, `note`) VALUES (NULL, '$type', '$pnum', '$desc', '$note')";
    
    if ($conn->query($sql) === FALSE)
    {
        echo "Error: " . $sql . "" . $conn->error;
    } else {
        $last_id = $conn->insert_id;
    }
    
    $conn->close();
    return 0;
}

// Set Part Numbers status to inactive
function deActivatePartNumber($num, $servername, $username, $password, $dbname)
{
    return;
}

// Set Part Numbers status to active
function ActivatePartNumber($num, $servername, $username, $password, $dbname)
{
    return;
}

// Get the type of the part 
function getPartType($num)
{
    return -1;
}

// Create a new bom or add part to exiting BOM
function createBillOfMaterial($parentno, $childno, $qty, $servername, $username, $password, $dbname)
{
    // If the parent and child aleady exit in the database, Exit
    if (CheckBOMForParentChildPair($parentno, $childno, $servername, $username, $password, $dbname))
    {
        return -1;
    }

    // Part can only be a type 1 or 2 assembly or Weldment
    if (getPartType($parentno) == 0)
    {
        return "Part must be either an assmebly or weldment <br/>";
    }
    // Add component to Bill of Material
    
    return 0;
}

// Remove part from a bill of material
function removePartFromBOM($parentno, $childno, $servername, $username, $password, $dbname)
{
    return -1;
}

// before adding a part to a bom, make sure that pair doesn't already exit
function CheckBOMForParentChildPair($parent, $child, $servername, $username, $password, $dbname)
{
    return -1;
}

function PrintSingleLevelBOM($parentno, $servername, $username, $password, $dbname)
{
    // Creates csv file for single level bom output
    return "";
}

function PrintMultiLevelBOM($parentno, $servername, $username, $password, $dbname)
{
    // Creates csv file for multi level bom output
    return "";
}

function ViewSingleLevelBOM($parentno, $servername, $username, $password, $dbname)
{
   
    return "";
}

function ViewMultiLevelBOM($parentno, $servername, $username, $password, $dbname)
{
    
    return "";
}

// Will return the part and a list of where that part is used
function searchForPartorAssembly($num)
{
    return "";
}

// Attempts to find s corresponding drawing for the given num and prints it
function printDrawing($num)
{
    return;
}


// Find and print all drawings associated with it at one level
function printAllDrawingsonSingleLevelBOM($num)
{
    return;
}

// Returns a delimited string with the part number,
// type, description, and note:
function getPartInfo($num,  $servername, $username, $password, $dbname)
{
    $outputstring = "";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $output = -1;
    //Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM part WHERE partnumber = '" . $num . "';";
    $result = $conn->query($sql);

    // Part exits
    if ($result->num_rows > 0)
    {
        while ($row=$result->fetch_assoc())
        {
            $outputstring = $row['partid'] . "|" . $row['type'] . "|" . $row['partnumber'] . "|" . $row['description'] . "|" . $row['note'] . "|" . $row['Active'];
        }
    }
    $conn->close();


    return $outputstring;
}

//echo doesPartExist($servername, $username, $password, $dbname, "C5-11-16");
//echo addPartToDataBase('0060836', 'PLATE, ACCESS, HEAT EXCHANGER COMPARTMENT', 0, 'Note:', $servername, $username, $password, $dbname) . "<br/>";
?>