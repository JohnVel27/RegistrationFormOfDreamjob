<?php
session_start();  // Start the session

require_once 'dbconfig.php';  // Ensure this includes the database connection
require_once 'datamodels.php'; // Ensure correct casing for the filename

if (isset($_POST['insertjobdreamerstudentbtn'])) {
    
    // Sanitize and validate input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $dreamjob = filter_input(INPUT_POST, 'dreamjob', FILTER_SANITIZE_STRING);

    // Check for empty fields
    if (empty($name) || empty($email) || empty($gender) || empty($dreamjob)) {
        echo "All fields are required.";
        exit; // Stop further execution
    }

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Insert into the database
    $query = insertIntoDreamJobsStudent($pdo, $name, $email, $gender, $dreamjob);

    if ($query) {
        $_SESSION['message'] = "Successfully inserted...!";
        header("Location: ../sql/insertjobdreamerstudent.php");
        exit; // Ensure no further code is executed after the redirect
    } else {
        echo "Query Failed: " . implode(", ", $pdo->errorInfo()); // Corrected to use $pdo
    }
}

// Handle delete request
if (isset($_POST['id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

    if ($id) {
        if (deleteJobDreamer($pdo, $id)) {
            header("Location: ../sql/tablefordeleteandupdate.php?success=delete");
            exit;
        } else {
            echo "Failed to delete the job dreamer.";
        }
    }
}

// Handle update request
if (isset($_POST['update'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $dreamjob = filter_input(INPUT_POST, 'dreamjob', FILTER_SANITIZE_STRING);

    if ($id && $name && $email && $gender && $dreamjob) {
        if (updateJobDreamer($pdo, $id, $name, $email, $gender, $dreamjob)) {
            header("Location: ../sql/tablefordeleteandupdate.php?success=update");
            exit;
        } else {
            echo "Failed to update the job dreamer.";
        }
    } else {
        echo "Please fill in all the fields.";
    }
}
?>

