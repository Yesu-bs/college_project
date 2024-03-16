<?php
echo "<style>
.button-container {
    display: flex;
    justify-content: space-between; /* Distribute buttons evenly */
    margin-top: 10px;
}

.delete-button,
.update-button {
    background-color: #dc3545; /* Red background color for delete button */
    color: white;
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.update-button {
    background-color: #007bff; /* Blue background color for update button */
}

.delete-button:hover,
.update-button:hover {
    background-color: #c82333; /* Darker red on hover for delete button */
}

.update-button:hover {
    background-color: #0056b3; /* Darker blue on hover for update button */
}
<style>";
?>