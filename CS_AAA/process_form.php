<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if staff_id is set and not empty
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        // Use $_SESSION['id'] for further processing
        $staff_id = $_SESSION['id'];

        // Database connection
        include('Sjc_db.php');

        // Create uploads directory if it doesn't exist
        $upload_dir = 'C1/VAC/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true); // Create the directory with full permissions
        }

        // Validate and sanitize input
        function validate_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $course_name = validate_input($_POST['course_name']);
        $mode = validate_input($_POST['category']);
        $course_code = validate_input($_POST['course_code']);
        $times_offered = validate_input($_POST['times_offered']);
        $duration_hours = validate_input($_POST['duration']);

        // Format dates to 'dd-mm-yyyy' format
        $start_date_formatted = date('d-m-Y', strtotime($_POST['start_date']));
        $end_date_formatted = date('d-m-Y', strtotime($_POST['end_date']));

        $total_students_enroll = validate_input($_POST['total_students_enroll']);
        $students_completed_course = validate_input($_POST['students_completed_course']);

        // File upload handling
        $evidence_filename = $_FILES['evidence']['name'];
        $evidence_tmpname = $_FILES['evidence']['tmp_name'];
        $evidence_path = $upload_dir . $evidence_filename;

        // Move uploaded file to uploads directory
        if (move_uploaded_file($evidence_tmpname, $evidence_path)) {
            // File uploaded successfully

            // Insert the record without the evidence_path
            $stmt = $connect_Staff->prepare("INSERT INTO value_added_courses (course_name, mode, course_code, times_offered, duration, start_date, end_date, total_students_enroll, students_completed_course, created_on, created_by, modified_on, modified_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, NOW(), ?)");
            $stmt->bind_param("sssiississs", $course_name, $mode, $course_code, $times_offered, $duration_hours, $start_date_formatted, $end_date_formatted, $total_students_enroll, $students_completed_course, $staff_id, $_SESSION['name']);

            if ($stmt->execute()) {
                // Get the ID of the inserted record
                $inserted_id = $stmt->insert_id;

                // Define the new filename
                $new_filename = 'C1_VAC_' . str_pad($inserted_id, 2, '0', STR_PAD_LEFT) . '.pdf';

                // Move the uploaded file to the uploads directory with the new filename
                $new_path = $upload_dir . $new_filename;
                if (rename($evidence_path, $new_path)) {
                    // Update the record with the correct evidence_path
                    $stmt_update = $connect_Staff->prepare("UPDATE value_added_courses SET evidence_path = ? WHERE id = ?");
                    $stmt_update->bind_param("si", $new_path, $inserted_id);
                    $stmt_update->execute();

                    // Redirect back to add_value_added_course.php with success message
                    header('Location: add_value_added_course.php?success=true');
                    exit;
                } else {
                    // Error moving the file
                    echo "<script>alert('Error moving uploaded file.');</script>";
                }
            } else {
                // Error executing the statement
                echo "<script>alert('Error executing statement.');</script>";
            }

            // Close statement
            $stmt->close();
        } else {
            // Error uploading the file
            echo "<script>alert('Error uploading file.');</script>";
        }

        // Close database connection
        $connect_Staff->close();
    } else {
        // Redirect if staff ID is not set
        header("Location: index.php?error=staff_id_not_set");
        exit;
    }
} else {
    // Redirect if form is not submitted using POST method
    header("Location: index.php?error=invalid_request");
    exit;
}
?>
