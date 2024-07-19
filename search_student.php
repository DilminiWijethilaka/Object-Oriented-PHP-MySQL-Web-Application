<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ccffcc, #f0fff0, #ffffff); /* Light Green to Lighter Green to White Gradient */
            background-repeat: no-repeat;
            text-align: center;
            margin: 50px;
            color: #333; /* Dark Text Color */
        }

        h2 {
            color: #333; /* Dark Text Color */
        }

        form {
            display: inline-block;
            text-align: left;
            background-color: #fff; /* White Form Background */
            padding: 20px;
            border: 1px solid #ddd; /* Light Gray Border */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555; /* Dark Gray Text */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        input[disabled] {
            background-color: #eee; /* Light Gray Background for Disabled Input */
            cursor: not-allowed;
        }

        input[type="submit"] {
            background-color: #33cc33; /* Light Green Button Color */
            color: #fff; /* White Text */
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #28a428; /* Slightly Darker Green on Hover */
        }
    </style>
</head>
<body>
    <?php
    $location = mysqli_connect("localhost", "root", "", "PYTHON_INSTITUTE 1");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $search_nic = $_POST['search_nic'];

        $sql2 = "SELECT * FROM student_registration WHERE NIC = '$search_nic'";
        $result = mysqli_query($location, $sql2);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // Display student information in styled text boxes
                $nic = $row['NIC'];
                $name = $row['Name'];
                $address = $row['Address'];
                $telno = $row['Tel_No'];
                $course = $row['Course'];

                echo "<h2>Student Profile</h2>";
                echo "<form>";
                echo "<label>N.I.C:</label><input type='text' value='$nic' disabled><br>";
                echo "<label>Name:</label><input type='text' value='$name' disabled><br>";
                echo "<label>Address:</label><input type='text' value='$address' disabled><br>";
                echo "<label>Tele No:</label><input type='text' value='$telno' disabled><br>";
                echo "<label>Course:</label><input type='text' value='$course' disabled><br>";
                echo "</form>";
            } else {
                echo "<p>Student not found.</p>";
            }
        } else {
            echo "<p>Error: " . mysqli_error($location) . "</p>";
        }
    }

    mysqli_close($location);
    ?>
</body>
</html>
