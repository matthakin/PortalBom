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
    $conn2 = new mysqli($servername, $username, $password, $dbname);
    $output = -10;
    //Check connection
    if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
    }
    //$sql = "SELECT * FROM `part` WHERE `partnumber` = `" . $num . "`";
    $sql = "SELECT * FROM part WHERE partnumber = '" . $num . "'";
    $result = $conn2->query($sql);
    
    if ($result->num_rows > 0)
    {
        $output = -1;
    }else
    {
        $output = 1;
    }

    
    
    $conn2->close();
    return $output;
}

// Add a new part to the database
function addPartToDataBase($pnum, $desc, $type, $note, $servername, $username, $password, $dbname, $uom)
{
    $last_id = 0;
    // Make sure part doesn't already exisy
    if (doesPartExist($servername, $username, $password, $dbname, $pnum) == -1)
    {
        return "Part already exits. <br/>";
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    //Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO `part` (`partid`, `type`, `partnumber`, `description`, `note`, `Active`, `uom`) VALUES (NULL, '$type', '$pnum', '$desc', '$note', 'yes', '$uom')";
    
    if ($conn->query($sql) === FALSE)
    {
        echo "Error: " . $sql . "" . $conn->error;
    } else {
        $last_id = $conn->insert_id;
    }
    
    $conn->close();
    return $last_id;
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


// If I can coax all the numbers out of SolidWorks or Fishbowl
function readincsvfile($path, $servername, $username, $password, $dbname)
{
    $filesnotadded = "";
    $completeBom = array();
    $file = fopen($path, 'r') or die("Unable to open");

    $fb_out2 = fgets($file);

    fclose($file);

    //echo $fb_out2 . "<br>";

    $completeBom = explode("@", $fb_out2);

    $TempString = "";

    for ($r = 0;$r < count($completeBom) - 1;$r++)      
    {

        $line = array();
        $line = explode('|', $completeBom[$r]);

        $tempType = "";

        if (substr($line[1],0,8) == "ASSEMBLY")
        {
            $tempType = 1;
        }else if (substr($line[1], 0 ,8) == "WELDMENT")
        {
            $tempType = 2;
        }else
        {
            $tempType = 0;
        }


        //return $line[0] . '\t' . $line[1] . '\t' . $tempType . '\t' . $line[2];

        addPartToDataBase($line[0], $line[1], $tempType, 'import', $servername, $username, $password, $dbname, $line[2]);




    }
    
    // Pull all lines of the csv into an array

    // loop through each and pull the part number

    // See if the number exists, if it doesn't, break apart
    // and add the part to the database


    return;
}

function testsubstring()
{
    $ass = "ASSEMBLY";
    $weld = "WELDMENT";
    $part = "Part";

    return substr($ass,0,8);
}


//echo doesPartExist($servername, $username, $password, $dbname, "C5-11-16");
//echo addPartToDataBase('0060836', 'PLATE, ACCESS, HEAT EXCHANGER COMPARTMENT', 0, 'Note:', $servername, $username, $password, $dbname) . "<br/>";
?>