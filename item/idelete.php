<?php 
if( isset($_GET["id"]) ){
    $id = $_GET["id"];

    $servername = "localhost";
$username = "root";
$password = "";
$database = "assignment";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM item WHERE id=$id";
$connection->query($sql);

}
header("location: /PHP-ERP-System/item/itemview.php");
exit;

?>