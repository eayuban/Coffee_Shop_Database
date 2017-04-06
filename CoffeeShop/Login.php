<!DOCTYPE html>
<?php
        // Access the database!
        $servername = "localhost";
        $username = "root";
        $password = "group15database";
        $db = "coffee shop"; 
            
        $conn = connectToDatabase($servername, $username, $password, $db);
            
        $username = $_POST[userData];
            
        if (ctype_digit($username) == true){
            employeeLogin($conn, $username);
        }
        else{
            customerLogin($conn, $username);
        }
            
    function employeeLogin($connection, $sin){
        $redirect = false;
        $password = $_POST[password];
            
        $sql = "SELECT
                *
                FROM
                employee
                WHERE
                SIN = '$sin'";
            
        $result = $connection->query($sql);
            
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(strcmp($row[Password], $password) == 0){
                $redirect = true;
            }
            else{
                echo "Wrong password!";
            }
        }
        else{
            echo "Invalid SIN!";
        }
        
        if($redirect){
            echo "<script type='text/javascript'> window.location.replace('employee.html'); </script>";
        }
            
    }

    function customerLogin($connection, $email){
        $redirect = false;
        if (substr_count($email, '@') != 1){
            echo "Login Information not valid!";
            closeDatabaseConn($connection);
        }
            
        $password = $_POST[password];
            
        $sql = "SELECT
                *
                FROM
                customer
                WHERE
                Email = '$email'";
            
        $result = $connection->query($sql);
            
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            if(strcmp($row[Password], $password) == 0){
                $redirect = true;
            }
            else{
                echo "Wrong password!";
            }
        }
        else{
            echo "Invalid Email!";
        }
        
        if($redirect){
            echo "<script type='text/javascript'> window.location.replace('customer.html'); </script>";
        }
    }
        
    function connectToDatabase($server, $user, $psswrd, $database){
        $conn = new mysqli($server, $user, $psswrd, $database);
            
        if ($conn->connect_error){
            die("Connection failed".$conn->connect_error);
        }
        else{
            return $conn;
        }
    }
        
    function closeDatabaseConn($dbConn){
        $dbConn -> close();
         die();
    }
            
?>
