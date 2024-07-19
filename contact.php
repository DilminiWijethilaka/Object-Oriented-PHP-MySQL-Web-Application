<?php

$path = mysqli_connect("localhost", "root", "", "PYTHON_INSTITUTE 1");

if (!$path) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$message = $_REQUEST['message'];

$sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";

if (mysqli_query($path, $sql)) {
    echo "Message sent successfully !!!";
} else {
    echo "Error: " . mysqli_error($path);
}

mysqli_close($path);

?>
