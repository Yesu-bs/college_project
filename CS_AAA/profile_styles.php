<?php
echo "
<head>
    <style>

/* Add your additional styles here */
/* Body styles */
body{
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
}

/* Profile styles */
.profile{
    margin-top: 20px;
    text-align: center;
    padding: 20px; /* Increase padding */
    border-radius: 10px; /* Add a border radius */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a shadow */
    background-color: #fff; /* White background */
    width: 50%; /* Set the width of the profile section */
    margin: 0 auto; /* Center the profile section */
}

.profile img {
    border-radius: 50%;
    border: 5px solid #fff; /* Add a white border */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    width: 100px; /* Set the width of the image */
    height: 100px; /* Set the height of the image */
    object-fit: cover; /* Ensure the image covers the entire space */
    margin-bottom: 20px; /* Add some space below the image */
}

.profile table{
    margin: 0 auto; /* Center the table */
    border-collapse: collapse;
    width: 80%; /* Set the width of the table */
}

.profile table th,
.profile table td{
    border: 1px solid #ddd; /* Light gray border for table cells */
    padding: 10px; /* Add padding */
    font-size: 14px; /* Set font size */
}

.profile table th{
    background-color: #f1f1f1; /* Light gray background for table headers */
    font-weight: bold; /* Make headers bold */
    text-transform: uppercase; /* Uppercase text in headers */
}
</style>
</head>";
?>
