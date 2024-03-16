<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sjc_project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Generate ALTER TABLE queries
$sql = "SELECT GROUP_CONCAT(
            CONCAT('ALTER TABLE ', table_name, ' ADD created_on DATETIME, ADD created_by VARCHAR(255), ADD modified_on DATETIME, ADD modified_by VARCHAR(255);')
        SEPARATOR '; ')
        AS alter_queries
        FROM information_schema.tables
        WHERE table_schema = 'sjc_project' AND table_type = 'BASE TABLE'";

// Execute query
$result = mysqli_query($conn, $sql);

// Check for errors
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $alter_queries = $row['alter_queries'];

    // Execute ALTER TABLE queries
    $queries_array = explode("; ", $alter_queries);
    foreach ($queries_array as $query) {
        if (!empty($query)) {
            if (mysqli_query($conn, $query)) {
                echo "Query executed successfully: $query\n";
            } else {
                echo "Error executing query: $query. Error: " . mysqli_error($conn) . "\n";
            }
        }
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
