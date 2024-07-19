<?php
$location = mysqli_connect("localhost", "root", "", "PYTHON_INSTITUTE 1");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nic = mysqli_real_escape_string($location, $_POST['update_nic']); // Sanitize inputs
    $name = mysqli_real_escape_string($location, $_POST['name']);
    $address = mysqli_real_escape_string($location, $_POST['address']);
    $telno = mysqli_real_escape_string($location, $_POST['telno']);
    $course = mysqli_real_escape_string($location, $_POST['course']);

    // Validate inputs (you can add more validation if needed)
    if (empty($nic) || empty($name) || empty($address) || empty($telno) || empty($course)) {
        echo "<p>All fields are required. Please fill out the form completely.</p>";
    } else {
        // Update the student's information in the database
        $update_query = "UPDATE student_registration SET Name='$name', Address='$address', Tel_No='$telno', Course='$course' WHERE NIC='$nic'";
        $update_result = mysqli_query($location, $update_query);

        if ($update_result) {
            echo "<p>Student information updated successfully.</p>";
        } else {
            echo "<p>Error updating student information: " . mysqli_error($location) . "</p>";
        }
    }
}

mysqli_close($location);
?>
