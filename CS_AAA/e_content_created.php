<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temporary Navbar Design</title>
    <style>
        /* Global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
        }
        /* Navbar styles */
        nav {
            background-color: #333;
            padding: 10px;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        li {
            margin: 0 10px;
        }
        a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #555;
        }
        /* Temporary design for empty navbar items */
        .empty-item {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .empty-item:hover {
            background-color: #ccc;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <ul>
            <li><a href="#" class="empty-item">Waiting</a></li>
            <li><a href="#" class="empty-item">waiting</a></li>
            <li><a href="#" class="empty-item">waiting</a></li>
        </ul>
    </nav>
</body>
</html>
