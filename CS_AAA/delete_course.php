<?php
include('Sjc_db.php');

// Validate the ID parameter
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    echo "ID: " . $id; // Debugging output

    // Delete the course record from the database
    $sql = "DELETE FROM value_added_courses WHERE id=?";
    $stmt = $connect_Staff->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        $stmt->close();
        $connect_Staff->close();
        
        // Redirect to the main page after successful deletion
        header("Location: add_value_added_course.php");
        exit();
    } else {
        $stmt->close();
        $connect_Staff->close();
        echo "Error deleting record: " . $connect_Staff->error;
        exit();
    }
} else {
    echo "Invalid ID.";
    exit();
}
?>
