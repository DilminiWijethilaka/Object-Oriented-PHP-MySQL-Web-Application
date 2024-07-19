<?php

$location = mysqli_connect ("localhost","root","","PYTHON_INSTITUTE 1");

$NIC = $_REQUEST['nic'];
$Name = $_REQUEST['name'];
$Address = $_REQUEST['address'];
$Gender = $_REQUEST['gender'];
$Tel_No = $_REQUEST['telno'];
$Course = $_REQUEST['course'];


$sql1 = "insert into student_registration values
        ('$NIC','$Name', '$Address','$Gender', '$Tel_No', '$Course')";

if(mysqli_query($location,$sql1))
{
    echo("Registration Successful !!!");
}


?>