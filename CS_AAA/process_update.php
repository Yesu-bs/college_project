<?php
include('Sjc_db.php');

if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $course_name = $_POST['course_name'];
    $mode = $_POST['category'];
    $course_code = $_POST['course_code'];
    $times_offered = $_POST['times_offered'];
    $duration = $_POST['duration'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $student_enroll = $_POST['total_students_enroll'];
    $students_completed = $_POST['students_completed'];

    // File upload handling
    $evidence_path = '';
    if(isset($_FILES['evidence']) && $_FILES['evidence']['error'] === UPLOAD_ERR_OK) {
        $evidence_name = $_FILES['evidence']['name'];
        $evidence_tmp_name = $_FILES['evidence']['tmp_name'];
        $evidence_path = 'C1/VAC/CHARLES_SIR/' . $evidence_name; // Assuming 'uploads/' is the directory where you want to store the file
        move_uploaded_file($evidence_tmp_name, $evidence_path);
    }

    // Update the record in the database
    $sql = "UPDATE value_added_courses SET course_name='$course_name', mode='$mode', course_code='$course_code', times_offered='$times_offered', duration='$duration', start_date='$start_date', end_date='$end_date', total_students_enroll='$student_enroll', students_completed_course='$students_completed', evidence_path='$evidence_path', modified_on=NOW(), modified_by='staff_name' WHERE id=$id";

    if ($connect_Staff->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully');
        window.location.href = 'add_value_added_course.php';</script>";
    } else {
        echo "Error updating record: " . $connect_Staff->error;
    }
}

$connect_Staff->close();
?>
