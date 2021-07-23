<?php
$servername = 'localhost';
$database = 'infodatabase';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername,$username, $password, $database );

$name = $_POST['ourName'];

$query = "DELETE FROM contacts WHERE NAME ='$name'";
mysqli_query($conn,$query);