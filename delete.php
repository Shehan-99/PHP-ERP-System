<?php 
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM customer WHERE id=$id";
$connection->query($sql);

}
header("location: /PHP-ERP-System/index.php");
exit;

?>