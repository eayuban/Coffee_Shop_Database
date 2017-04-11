<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you are SIGNING UP for our rewards program!</h1>
        <?php
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = connectToDatabase($servername, $username, $password, $db);
            
            addCustomer($conn);
            closeDatabaseConn($conn);
            echo "<script type='text/javascript'> window.location.replace('homePage.html'); </script>";

            
        function addCustomer($conn){
            echo "Adding $_POST[name] to the database!<br>";
            
            $name = $_POST[name];
            $email = $_POST[email];
            $newPassword = $_POST[password];
            $confirmation = $_POST[confirmpassword];
            $birthday = $_POST[birthday];
            
            if(strcmp($newPassword,$confirmation) == -1){
                echo("Your passwords do not match!<br>");
                closeDatabaseConn($conn);
            }
                
            $sql = "INSERT
                    INTO customer (Email, Password, Name, Birthday)
                    VALUES
                    ('$email', '$newPassword', '$name', '$birthday')";
            
                if($conn->query($sql) == TRUE){
                    echo "Added $_POST[name] successfully!<br>";
                }
                else{
                    echo "$_POST[name] was not added successfully...<br>".$conn->error."<br>";
                    return;
                }
            
                echo "Showing the current state of the 'employee' table:<br>";
            
                $sql = "SELECT
                        *
                        FROM
                        customer";
            
                $result = $conn->query($sql);
            
                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo "Email: ".$row["Email"]." - Name: ".$row["Name"]." - Birthday: ".
                                $row["Birthday"]." - Points Balance: ".$row[Points_Balance]."<br>";
                    }
                }
            }
        
        function connectToDatabase($server, $user, $psswrd, $database){
            $conn = new mysqli($server, $user, $psswrd, $database);
            
            if ($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            else{
                echo "Connected to Database $database...<br>";
                return $conn;
            }
        }
        
        function closeDatabaseConn($dbConn){
            $dbConn -> close();
        }
            
        ?>
    </body>
