<?php
$servername = "localhost";
$username = "root";
$password = ""; // No password
$database = "sjc_project";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Modify Column Type
$sql = "SELECT CONCAT('ALTER TABLE ', table_name, ' MODIFY COLUMN audit_year VARCHAR(9);') AS query
        FROM information_schema.columns
        WHERE table_schema = '$database' AND column_name = 'audit_year'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output ALTER TABLE queries to a file
    $output_file = fopen("modify_column_type.sql", "w");
    while($row = mysqli_fetch_assoc($result)) {
        fwrite($output_file, $row["query"] . "\n");
    }
    fclose($output_file);
    echo "Modify column type queries generated successfully!\n\n";
} else {
    echo "No tables found with the audit_year column.\n\n";
}

// Execute Modify Column Type queries
$sql = file_get_contents("modify_column_type.sql");
if (!empty($sql)) {
    if (mysqli_multi_query($conn, $sql)) {
        do {
            // Empty each query result
            if ($result = mysqli_store_result($conn)) {
                mysqli_free_result($result);
            }
        } while (mysqli_next_result($conn));
        echo "Column type modified successfully!\n\n";
    } else {
        echo "Error executing modify column type queries: " . mysqli_error($conn) . "\n\n";
    }
}

// Update Column Values
$sql = "SELECT CONCAT('UPDATE ', table_name, ' SET audit_year = \'2023-2024\';') AS query
        FROM information_schema.columns
        WHERE table_schema = '$database' AND column_name = 'audit_year'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        $update_query = $row["query"];
        if (mysqli_query($conn, $update_query)) {
            echo "Column values updated successfully!\n\n";
        } else {
            echo "Error updating column values: " . mysqli_error($conn) . "\n\n";
        }
    }
} else {
    echo "No tables found with the audit_year column to update.\n\n";
}

// Close connection
mysqli_close($conn);
?>
