<!-- header_style.php -->
<style>
/* Header styles */
.header {
    background-color: teal; /* Dark background color */
    color: #fff; /* Text color */
    padding: 10px 0; /* Padding for the header */
    text-align: center; /* Center align the content */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
    display: flex; /* Use flexbox for layout */
    justify-content: center; /* Center the header content horizontally */
    align-items: center; /* Center the header content vertically */
}

.header p {
    font-size: 24px; /* Larger font size */
    font-weight: bold; /* Bold text */
    text-transform: uppercase; /* Uppercase text */
    letter-spacing: 2px; /* Increased letter spacing */
    margin-left: 5px; /* Add some space to the left of the text */
}

.header img {
    border-radius: 50%; /* Make the image round */
    width: 50px; /* Set a fixed width */
    height: 50px; /* Set a fixed height */
    margin-right: 10px; /* Add some space to the right of the image */
}

/* Media query for smaller screens */
@media only screen and (max-width: 600px) {
    .header {
        flex-direction: column; /* Stack elements vertically */
        text-align: center; /* Center align text */
    }

    .header img {
        margin-right: 0; /* Remove right margin */
        margin-bottom: 10px; /* Add bottom margin for spacing */
    }
}
</style>
