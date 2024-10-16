<?php
require_once '../core/datamodels.php'; // Include datamodels to fetch data

if (isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $jobDreamer = getJobDreamerById($pdo, $id);
}

if (!$jobDreamer) {
    echo "Job Dreamer not found!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Dreamer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
            color: green;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Job Dreamer</h2>

    <form action="../core/handleform.php" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($jobDreamer['jobdreamerID']); ?>">

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($jobDreamer['name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($jobDreamer['email']); ?>" required>

        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male" <?php if ($jobDreamer['gender'] == 'Male') echo 'selected'; ?>>Male</option>
            <option value="Female" <?php if ($jobDreamer['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            <option value="Other" <?php if ($jobDreamer['gender'] == 'Other') echo 'selected'; ?>>Other</option>
        </select>

        <label for="dreamjob">Dream Job:</label>
        <input type="text" id="dreamjob" name="dreamjob" value="<?php echo htmlspecialchars($jobDreamer['dreamjob']); ?>" required>

        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>
