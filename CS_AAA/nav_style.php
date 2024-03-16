<!-- nav_style.php -->
<style>
/* Main Navigation */
nav {
    background-color: teal; /* Dark background color */
    padding: 10px 0; /* Padding for the navigation bar */
    border-bottom: 1px solid #555; /* Add a bottom border */
    box-shadow: 0 2px 4px teal; /* Add a subtle shadow */
}

nav ul {
    list-style-type: none; /* Remove default list style */
    margin: 0;
    padding: 0;
    text-align: center; /* Center align the navigation items */
}

nav ul li {
    display: inline-block; /* Display the list items inline */
    margin-right: 20px; /* Add some spacing between items */
}

nav ul li:last-child {
    margin-right: 0; /* Remove margin from the last item */
}

nav ul li a {
    color: #fff; /* Text color */
    text-decoration: none;
    padding: 12px 15px; /* Padding for each link - increased for larger clickable area */
    border-radius: 5px; /* Rounded corners for the links */
    transition: background-color 0.3s, color 0.3s; /* Smooth background color and text color transition */
    font-size: 16px; /* Font size increased */
    font-weight: bold; /* Set font weight to bold */
}

nav ul li a:hover {
    background-color: #ffd700; /* Background color on hover */
    color: #000; /* Change text color on hover */
}

/* Sub-menu */
nav ul li .sub-menu {
    display: none;
    position: absolute;
    background-color: teal; /* Background color */
    z-index: 1; /* Ensure sub-menu appears above content */
}

nav ul li:hover .sub-menu {
    display: block; /* Display sub-menu on hover */
}

nav ul li .sub-menu a {
    color: white; /* Text color */
    padding: 10px;
    text-decoration: none;
    display: block;
    text-align: left;
}

nav ul li .sub-menu a:hover {
    background-color: #555; /* Darker background color on hover */
}
</style>
