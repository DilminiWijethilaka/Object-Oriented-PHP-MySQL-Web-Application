<?php
$location = mysqli_connect("localhost", "root", "", "PYTHON_INSTITUTE 1");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $delete_nic = $_POST['delete_nic'];

    $sql = "DELETE FROM student_registration WHERE NIC = '$delete_nic'";
    
    if (mysqli_query($location, $sql)) {
        echo "<p>Student deleted successfully.</p>";
    } else {
        echo "<p>Error deleting student: " . mysqli_error($location) . "</p>";
    }
}

mysqli_close($location);
?>
