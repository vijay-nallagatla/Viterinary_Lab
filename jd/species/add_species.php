<?php
require('../dbConfig.php');

$name=$_REQUEST['species_name'];
$desc=$_REQUEST['species_desc'];
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$st=$conn->prepare("insert into species(species_name,species_desc) VALUES('$name','$desc')") ;
	$st->execute();
	
	echo "Successfully Species has been added !!!";
	
}catch(PDOException $e)
    {
    echo "Error: " . $e->getMessage();
    }
$conn = null;
?>