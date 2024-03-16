<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "sjc_project";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get all tables in the database
$tablesQuery = "SHOW TABLES";
$tablesResult = $conn->query($tablesQuery);

if ($tablesResult->num_rows > 0) {
    // Loop through each table
    while($row = $tablesResult->fetch_assoc()) {
        $tableName = $row["Tables_in_" . $database];
        
        // Get the name of the first column for the table
        $columnsQuery = "SHOW COLUMNS FROM $tableName";
        $columnsResult = $conn->query($columnsQuery);
        $firstColumn = "";
        if ($columnsResult->num_rows > 0) {
            $firstColumnRow = $columnsResult->fetch_assoc();
            $firstColumn = $firstColumnRow["Field"];
        }
        
        // Add the new column after the first column
        $addColumnQuery = "ALTER TABLE $tableName ADD COLUMN audit_year DATE AFTER $firstColumn";
        if ($conn->query($addColumnQuery) === TRUE) {
            echo "Column added successfully to table $tableName<br>";
        } else {
            echo "Error adding column to table $tableName: " . $conn->error . "<br>";
        }
    }
} else {
    echo "No tables found in the database.";
}

// Close connection
$conn->close();
?>
