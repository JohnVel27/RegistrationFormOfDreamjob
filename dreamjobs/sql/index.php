<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action Buttons</title>
    <style>
        /* Basic styling for the body */
        body {
            background-color: #f8f9fa; /* Light background color */
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            margin: 0; /* Remove default margin */
            flex-direction: column; /* Stack buttons vertically */
        }

        /* Basic styling for buttons */
        .action-button {
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF; /* Bootstrap primary color */
            color: white;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none; /* No underline for links */
            display: inline-block; /* To allow padding */
            transition: background-color 0.3s; /* Smooth transition */
        }

        .action-button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>

    <h2>Action Buttons</h2>
    <a href="http://localhost/dreamjobs/sql/insertjobdreamerstudent.php" class="action-button">Insertion</a>
    <a href="http://localhost/dreamjobs/sql/tablefordeleteandupdate.php" class="action-button">Table for update and delete</a>


</body>
</html>