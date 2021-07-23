<?php
$servername = 'localhost';
$database = 'infodatabase';
$username = 'root';
$password = '';

$conn = mysqli_connect($servername,$username, $password, $database );

$Name = $_POST['ourName'];
$Tel = $_POST['ourTel'];

$query = "INSERT INTO contacts (NAME, TEL) VALUES ('$Name', '$Tel')";
mysqli_query($conn,$query);