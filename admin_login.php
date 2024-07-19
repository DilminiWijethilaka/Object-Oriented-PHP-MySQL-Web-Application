<?php

$path = mysqli_connect ("localhost","root","","PYTHON_INSTITUTE 1");

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$sql = "insert into student_login values
        ('$username','$password')";

if(mysqli_query($path,$sql))
{
    echo("Login Successful !!!");
}


?>