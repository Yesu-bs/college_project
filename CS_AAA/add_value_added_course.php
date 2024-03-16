<?php
session_start();
if(!isset($_SESSION['login']))
    header('location:index.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College home page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php include("Sjc_header_style.php"); ?>
    <?php include("nav_style.php"); ?>
    <?php include("form_design.php"); ?>
    <?php include("table_design.php"); ?>
    <?php include("table_design.php"); ?>
    <?php include("delete_button_design.php"); ?>
    <?php include("update_button_design.php"); ?>
    <style>
    /* Styling for the staff name */
    .staff_name {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-top: 20px;
        color: #045c66; /* Custom color */
        text-transform: uppercase; /* Convert to uppercase */
        letter-spacing: 2px; /* Increase letter spacing */
        border-bottom: 2px solid #045c66; /* Add a bottom border */
        padding-bottom: 5px; /* Adjust space below the text */
    }
</style>
</head>
<body>
    <?php include_once("Sjc_header.php"); ?>
    
    <!-- Add Value Added Course form -->
    <p class="staff_name">Staff Name:<?php  $staff_name=$_SESSION['name']; echo $staff_name;?></p>
    
    <div class="form1">
        <p>Add Value Added Course</p>
        <form id="addCourseForm" action="process_form.php" method="post" enctype="multipart/form-data">
            <table>    
                <tr>
                    <td><label>Name of the Value Added Course:</label></td>
                    <td><input type="text" id="course_name" name="course_name" placeholder="Name of the Value Added Course" required></td>
                    <td><label>Mode</label></td>
                    <td>
                        <input type="radio" name="category" value="Online" required>Online
                        <input type="radio" name="category" value="Offline">Offline
                        <input type="radio" name="category" value="Blended">Blended
                    </td>          
                </tr>
                <tr>
                    <td><label for="course_code">Course Code:</label></td>
                    <td><input type="text" id="course_code" name="course_code" placeholder="Course Code" ></td>
                    <td><label for="times_offered">Number of Times Offered(in a year):</label></td>
                    <td>
                        <select id="times_offered" name="times_offered" required>
                            <option value="">Select</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="duration">Duration (in hours):</label></td>
                    <td>
                        <select id="duration" name="duration" required>
                            <option value="">Select</option>
                            <option value="30">30 hours</option>
                            <option value="45">45 hours</option>
                            <option value="60">60 hours</option>
                        </select>
                    </td>
                    <td><label for="start_date">Start Date:</label></td>
                    <td><input type="date" id="start_date" name="start_date" placeholder="Start Date" required></td>
                </tr>
                <tr>
                    <td><label for="end_date">End Date:</label></td>
                    <td><input type="date" id="end_date" name="end_date" placeholder="End Date" required></td>
                    <td><label for="total_students_enroll">Total Students Enrolled:</label></td>
                    <td><input type="number" id="total_students_enroll" name="total_students_enroll" min="1" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="Total Students Enrolled" required></td>
                </tr>
                <tr>
                    <td><label for="students_completed_course">Students Completed Course:</label></td>
                    <td><input type="number" id="students_completed_course" name="students_completed_course" min="1" step="1" oninput="this.value = this.value.replace(/[^0-9]/g, '');"  placeholder="Students Completed Course" required></td>
                </tr>
                
                <tr>
            <td colspan="2" class="centered-text">
                <p>Evidence (PDF)</p>
                
            </td>
        </tr>
        <tr> 
            <td><label for="evidence">Report of the course (PDF):</label></td>
            <td><input type="file" id="evidence" name="evidence" accept=".pdf" placeholder="Evidence (PDF)" required></td>
        </tr>



                <tr>
                    <td colspan="4" align="center">
                        <input type="submit" value="Submit" name="submit">
                        <input type="reset" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- End of Add Value Added Course form -->

    <!-- Table to display Value Added Course data -->
    <div class="read">
        <h2 style="text-align: center;">Value Added Courses</h2>
        <table border="1">
            <thead>
                <tr>
                    <!-- Add the ID column -->
                    <th>ID</th>
                    <th>Name of the Course</th>
                    <th>Mode</th>
                    <th>Course Code</th>
                    <th>Number of Times Offered</th>
                    <th>Duration (hours)</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Total Students Enrolled</th>
                    <th>Students Completed Course</th>
                    <th>Evidence (PDF)</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <!-- PHP code to fetch and display data -->
                <?php
                // Database connection
                include('Sjc_db.php');

                // Fetch data from the value_added_courses table
                $sql = "SELECT * FROM value_added_courses";
                $result = $connect_Staff->query($sql);

                // Display data in table format
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        // Display the ID in the first column
                        echo "<td>".$row["id"]."</td>";
                        echo "<td>".$row["course_name"]."</td>";
                        echo "<td>".$row["mode"]."</td>";
                        echo "<td>".$row["course_code"]."</td>";
                        echo "<td>".$row["times_offered"]."</td>";
                        echo "<td>".$row["duration"]."</td>";
                        echo "<td>".$row["start_date"]."</td>";
                        echo "<td>".$row["end_date"]."</td>";
                        echo "<td>".$row["total_students_enroll"]."</td>";
                        echo "<td>".$row["students_completed_course"]."</td>";
                        $evidence_path = $row["evidence_path"];
                        if (file_exists($evidence_path)) {
                            echo "<td><a href='$evidence_path' target='_blank'>View PDF</a></td>";
                        } else {
                            echo "<td>File Not Found</td>";
                        }
                        

                        echo "<td>";
                        echo "<button id='delete' onclick=\"return confirm('Are you sure you want to delete this record?')\"><a href='delete_course.php?id=".$row['id']."'>Delete</a></button>";
                        echo "<button id='update' onclick=\"return confirm('Are you sure you want to update this record?')\"><a href='update_course.php?id=".$row['id']."'>Update</a></button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='12'>No courses found</td></tr>";
                }

                // Close database connection
                $connect_Staff->close();
                ?>
            </tbody>
        </table>
    </div>
    <!-- End of Table to display Value Added Course data -->

    <!-- JavaScript code -->
    <script>
        document.getElementById('addCourseForm').addEventListener('submit', function(event) {
            // Check if the selected mode value is valid
            var selectedMode = document.querySelector('input[name="category"]:checked');
            if (!selectedMode) {
                alert('Please select a mode (Online, Offline, or Blended)');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the number of students completed is greater than student enrollment
            var totalStudentsEnrolled = parseInt(document.getElementById('total_students_enroll').value);
            var studentsCompletedCourse = parseInt(document.getElementById('students_completed_course').value);
            if (studentsCompletedCourse > totalStudentsEnrolled) {
                alert('Error: Students completed course cannot be greater than total students enrolled.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the start date is after the end date
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(document.getElementById('end_date').value);
            if (startDate >= endDate) {
                alert('Error: End date must be greater than start date.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the total enrollment is greater than zero
            if (totalStudentsEnrolled <= 0 || isNaN(totalStudentsEnrolled)) {
                alert('Error: Total Students Enrolled must be greater than zero.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Check if the total students completed course is greater than or equal to zero
            if (studentsCompletedCourse < 0 || isNaN(studentsCompletedCourse)) {
                alert('Error: Students Completed Course must be greater than or equal to zero.');
                event.preventDefault(); // Prevent form submission
                return;
            }

            // Show a confirmation dialog
            if (!confirm('Are you sure you want to submit the form?')) {
                event.preventDefault(); // If the user cancels, prevent form submission
                return;
            }
        });

        // Add an event listener to the end date input field
        document.getElementById('end_date').addEventListener('change', function() {
            var startDate = new Date(document.getElementById('start_date').value);
            var endDate = new Date(this.value); // 'this' refers to the end date input field
            
            // Check if the end date is less than the start date
            if (endDate <= startDate) {
                alert('Error: End date must be greater than start date.');
                // Optionally, you can clear the end date field or set it to the start date
                // this.value = ''; // Clear the end date field
                // this.value = document.getElementById('start_date').value; // Set end date to start date
            }
        });

        // Add an event listener to the students completed course input field
        document.getElementById('students_completed_course').addEventListener('input', function() {
            var totalStudentsEnrolled = parseInt(document.getElementById('total_students_enroll').value);
            var studentsCompletedCourse = parseInt(this.value);
            if (studentsCompletedCourse > totalStudentsEnrolled) {
                alert('Error: Students completed course cannot be greater than total students enrolled.');
                this.value = ''; // Clear the value
            }
        });
    </script>
</body>
</html>
