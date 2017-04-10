<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>

    <body>
        <h1>You are here because you ADDED MORE TEA/BEANS to the Database</h1>
        <?php
        session_start();
        // Access the database!
        $servername = "localhost";
        $username = "root";
        $password = "group15database";
        $db = "coffee shop";

        $conn = connectToDatabase($servername, $username, $password, $db);

        addTimeAvailability($conn);
        closeDatabaseConn($conn);

        function addTimeAvailability($conn) {
            $sin = $_SESSION[empSIN];
            $date = $_POST[date];
            $start = $_POST[startTime];
            $end = $_POST[endTime];

            $sql = "INSERT INTO 
                    time_availability (ESIN, Date, Start, Finish)
                    VALUES
                    ('$sin', '$date', '$start', '$end')";

            if ($conn->query($sql) == TRUE) {
                echo "Added time availability successfully!<br>";
            } else {
                echo "Time availability was not added successfully...<br>" . $conn->error . "<br>";
            }
        }

        function connectToDatabase($server, $user, $psswrd, $database) {
            $conn = new mysqli($server, $user, $psswrd, $database);

            if ($conn->connect_error) {
                die("Connection failed" . $conn->connect_error);
            } else {
                echo "Connected to Database $database...<br>";
                return $conn;
            }
        }

        function closeDatabaseConn($dbConn) {
            $dbConn->close();
            die("Disconnected from Database.");
        }
        ?>
    </body>