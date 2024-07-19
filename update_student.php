<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ccffcc, #f0fff0, #ffffff);
            background-repeat: no-repeat; /* Light Green to Lighter Green to White Gradient */
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
        $update_nic = $_POST['update_nic'];

        $sql = "SELECT * FROM student_registration WHERE NIC = '$update_nic'";
        $result = mysqli_query($location, $sql);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            if ($row) {
                // Display student information in editable text boxes
                $nic = $row['NIC'];
                $name = $row['Name'];
                $address = $row['Address'];
                $telno = $row['Tel_No'];
                $course = $row['Course'];

                echo "<h2>Update Student Profile</h2>";
                echo "<form method='post' action='process_update.php'>";
                echo "<label>N.I.C:</label><input type='text' name='update_nic' value='$nic' readonly><br>";
                echo "<label>Name:</label><input type='text' name='name' value='$name'><br>";
                echo "<label>Address:</label><input type='text' name='address' value='$address'><br>";
                echo "<label>Tele No:</label><input type='text' name='telno' value='$telno'><br>";
                echo "<label>Course:</label><input type='text' name='course' value='$course'><br>";
                echo "<input type='submit' value='Update'>";
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
