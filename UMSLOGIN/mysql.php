<html>
<head></head>
<title>mysql</title>
<body>

<?php


$servername = "localhost";
$db_username = "root";
$password='';
$db_name='firstphp';

$conn = new mysqli($servername, $db_username, $password, $db_name);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

</body>
</html>