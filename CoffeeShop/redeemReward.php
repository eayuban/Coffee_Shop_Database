<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>

    <body>
        <h1>You are here because you want to REDEEM a REWARD</h1>

        <?php
        session_start();
        // Access the database!
        $servername = "localhost";
        $username = "root";
        $password = "group15database";
        $db = "coffee shop";

        $conn = connectToDatabase($servername, $username, $password, $db);

        redeemReward($conn);

        closeDatabaseConn($conn);

        function redeemReward($conn) {
            $sql = "SELECT PointCost
                    FROM rewards
                    WHERE Type = '$_POST[reward]'";
     
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $pointsToSubtract = $row[PointCost];



            $sql = "SELECT Points_Balance
                    FROM customer
                    WHERE Email = '$_SESSION[custEmail]'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $currentPoints = $row[Points_Balance];

            $newPoints = $currentPoints - $pointsToSubtract;

            $sql = "UPDATE customer
                    SET Points_Balance = $newPoints
                    WHERE Email = '$_SESSION[custEmail]'";

            if ($conn->query($sql) == TRUE) {
                echo "Updated $_SESSION[custEmail]'s points successfully!<br>";
            } else {
                echo "$_SESSION[custEmail]'s points were not updated successfully...<br>" . $conn->error . "<br>";
            }
            
           $sql = "INSERT INTO
                   redeemed_rewards (RewardType, CustomerEmail)
                   VALUES ('$_POST[reward]', '$_SESSION[custEmail]')";
           
            if ($conn->query($sql) == TRUE) {
                echo "Added reward to redeemed reward history!<br>";
            } else {
                echo "Redeemed reward not recorded...<br>" . $conn->error . "<br>";
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

