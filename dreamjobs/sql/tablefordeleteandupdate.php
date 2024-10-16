<?php
require_once '../core/dbconfig.php'; // Connection for dbconfig
require_once '../core/datamodels.php'; // Connection for datamodels
require_once '../core/handleform.php'; // Connection for handleform

// Fetch all job dreamers
$jobdreamers = getAllJobDreamers($pdo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Dreamers List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        button {
            padding: 5px 10px;
            cursor: pointer;
        }
        .update-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<h2>Job Dreamers List</h2>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Dream Job</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($jobdreamers)): ?>
            <?php foreach ($jobdreamers as $dreamer): ?>
            <tr>
                <td><?php echo htmlspecialchars($dreamer['name']); ?></td>
                <td><?php echo htmlspecialchars($dreamer['email']); ?></td>
                <td><?php echo htmlspecialchars($dreamer['gender']); ?></td>
                <td><?php echo htmlspecialchars($dreamer['dreamjob']); ?></td>
                <td>
                    <!-- Delete Form -->
                    <form style="display:inline-block;" action="../core/handleform.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        <input type="hidden" name="id" value="<?php echo $dreamer['jobdreamerID']; ?>">
                        <button class="delete-btn" type="submit">DELETE</button>
                    </form>
                    <!-- Edit Form -->
                    <form style="display:inline-block;" action="editjobdreamer.php" method="GET">
                        <input type="hidden" name="id" value="<?php echo $dreamer['jobdreamerID']; ?>">
                        <button class="update-btn" type="submit">EDIT</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No job dreamers found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>
