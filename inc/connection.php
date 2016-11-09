<?php
$dbservername = "localhost";
$dbname = "gift";
$dbusername = "CodeLouisvilleProjectPHP";
$dbpassword = "treehouse";
$dbtable = "gift_detail";


try {
    $db = new PDO("mysql:host=$dbservername;dbname=$dbname", $dbusername, $dbpassword);
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
	exit;
    }
