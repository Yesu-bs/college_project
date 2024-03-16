<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Value Added Course</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include("Sjc_header_style.php"); ?>
    <?php include("nav_style.php"); ?>
    <?php include("form_design.php"); ?>
    <?php include("table_design.php"); ?>
    <?php include("table_design.php"); ?>
    <?php include("delete_button_design.php"); ?>
    <?php include("update_button_design.php"); ?>
</head>
<body>
    <?php include_once("Sjc_header.php"); ?>
    <div class="form1">
        <p style="color: black;">Update Value Added Course</p>
        <?php
        include('Sjc_db.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            // Fetch the course details based on the ID
            $sql = "SELECT * FROM value_added_courses WHERE id = $id";
            $result = $connect_Staff->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
        ?>
        <form id="updateCourseForm" action="process_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <table>
                <tr>
                    <td><label>Name of the Value Added Course:</label></td>
                    <td><input type="text" name="course_name" value="<?php echo isset($row['course_name']) ? $row['course_name'] : ''; ?>" required></td>
                    <td><label>Mode:</label></td>
                    <td>
                        <input type="radio" name="category" value="Online" <?php if (isset($row['mode']) && $row['mode'] == 'Online') echo 'checked'; ?>> Online
                        <input type="radio" name="category" value="Offline" <?php if (isset($row['mode']) && $row['mode'] == 'Offline') echo 'checked'; ?>> Offline
                        <input type="radio" name="category" value="Blended" <?php if (isset($row['mode']) && $row['mode'] == 'Blended') echo 'checked'; ?>> Blended
                    </td>
                </tr>
                <!-- Add other fields and populate them with existing data -->
                <tr>
                    <td><label for="course_code">Course Code:</label></td>
                    <td><input type="text" id="course_code" name="course_code" value="<?php echo isset($row['course_code']) ? $row['course_code'] : ''; ?>" placeholder="Course Code" required></td>
                    <td><label for="times_offered">Number of Times Offered:</label></td>
                    <td><input type="text" id="times_offered" name="times_offered" value="<?php echo isset($row['times_offered']) ? $row['times_offered'] : ''; ?>" min="0" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Number of Times Offered" required></td>
                </tr>
                <!-- Add other fields and populate them with existing data -->
                <tr>
                    <td><label for="duration">Duration (in hours):</label></td>
                    <td><input type="number" id="duration" name="duration" value="<?php echo isset($row['duration']) ? $row['duration'] : ''; ?>" min="0" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Duration (in hours)" required></td>
                    <td><label for="start_date">Start Date:</label></td>
                    <td><input type="date" id="start_date" name="start_date" value="<?php echo isset($row['start_date']) ? date('Y-m-d', strtotime($row['start_date'])) : ''; ?>" required></td>
                </tr>
                <!-- Add other fields and populate them with existing data -->
                <tr>
                    <td><label for="end_date">End Date:</label></td>
                    <td><input type="date" id="end_date" name="end_date" value="<?php echo isset($row['end_date']) ? date('Y-m-d', strtotime($row['end_date'])) : ''; ?>" required></td>
                    <td><label for="student_enroll">Student Enrollment:</label></td>
                    <td><input type="number" id="student_enroll" name="student_enroll" value="<?php echo isset($row['total_students_enroll']) ? $row['total_students_enroll'] : ''; ?>" min="0" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Student Enrollment" required></td>
                </tr>
                <!-- Add other fields and populate them with existing data -->
                <tr>
                    <td><label for="students_completed">Students Completed:</label></td>
                    <td><input type="number" id="students_completed" name="students_completed" value="<?php echo isset($row['students_completed_course']) ? $row['students_completed_course'] : ''; ?>" min="0" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Students Completed" required></td>
                    <td><label for="evidence">Report of the course:</label></td>
                    <td><input type="file" id="evidence" name="evidence" accept=".pdf"></td>
                </tr>
                
                <tr>
                    <td colspan="4" align="center">
                        <input type="submit" value="Update" name="update">
                        
                    </td>
                </tr>
            </table>
        </form>
        <?php
                } else {
                    echo "Record not found";
                }
            } else {
                echo "ID parameter not provided";
            }

            $connect_Staff->close();
        ?>
    </div>
</body>
</html>
