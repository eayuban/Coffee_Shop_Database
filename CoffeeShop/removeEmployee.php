<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Coffee Shop</title>
    </head>
    
    <body>
        <h1>You are here because you REMOVED an EMPLOYEE from the Database</h1>
        <?php
            // Access the database!
            $servername = "localhost";
            $username = "root";
            $password = "group15database";
            $db = "coffee shop"; 
            
            $conn = new mysqli($servername, $username, $password, $db);
            
            if ($conn->connect_error){
                die("Connection failed".$conn->connect_error);
            }
            else{
                echo "Connected to Database $db...<br>";
            }
            
            echo "Showing the current state of the 'employee' table:<br><br>";
            
            $sql = "SELECT
                    *
                    FROM
                    employee";
            
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "SIN: ".$row["SIN"]." - Name: ".$row["Name"]." - Manager: ".
                            $row["ManagerSIN"]."<br>";
                }
            }
            
            echo "<br>Attempting to remove the employee with SIN: $_POST[sin] from"
                 . " the database!<br>";
            
            $sin = $_POST[sin];
            
            $sql = "DELETE
                    FROM employee
                    WHERE SIN='$sin'";
            
            if($conn->query($sql) === TRUE){
                echo "Removed employee with SIN: $_POST[sin] successfully!<br><br>";
            }
            else{
                echo "Employee with SIN: $_POST[sin] was not found...".$conn->error."<br><br>";
            }
            
            echo "Showing the new state of the 'employee' table:<br><br>";
            
            $sql = "SELECT
                    *
                    FROM
                    employee";
            
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo "SIN: ".$row["SIN"]." - Name: ".$row["Name"]." - Manager: ".
                            $row["ManagerSIN"]."<br>";
                }
            }
            
            $conn -> close();
        ?>
    </body>


