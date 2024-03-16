<?php
// File to be deleted
$filename_to_delete = "add_columns.sql";

// Check if the file exists
if (file_exists($filename_to_delete)) {
    // Attempt to delete the file
    if (unlink($filename_to_delete)) {
        echo "File '$filename_to_delete' deleted successfully.\n";
    } else {
        echo "Error: Unable to delete '$filename_to_delete'.\n";
    }
} else {
    echo "File '$filename_to_delete' does not exist.\n";
}

// Now proceed to generate ALTER TABLE queries

// Generate a unique filename with timestamp and random number for the output file
$output_filename = "alter_tables_" . date("YmdHis") . "_" . mt_rand(1000, 9999) . ".sql";

// Generate ALTER TABLE queries
$sql = "SELECT GROUP_CONCAT(
            CONCAT('ALTER TABLE ', table_name, ' ADD created_on DATETIME, ADD created_by VARCHAR(255), ADD modified_on DATETIME, ADD modified_by VARCHAR(255);')
        SEPARATOR ' ')
        INTO OUTFILE '$output_filename'
        FROM information_schema.tables
        WHERE table_schema = 'sjc_project' AND table_type = 'BASE TABLE'";

// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "sjc_project");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Execute query
$result = mysqli_query($conn, $sql);

// Check for errors
if ($result) {
    echo "ALTER TABLE queries generated successfully!\n";
    echo "Output file: $output_filename\n";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
