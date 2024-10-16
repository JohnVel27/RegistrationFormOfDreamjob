<?php
require_once 'dbconfig.php';

function insertIntoDreamJobsStudent($pdo, $name, $email, $gender, $dreamjob) {
    // SQL query for inserting into the jobdreamers table
    $sql = "INSERT INTO jobdreamers (name, email, gender, dreamjob) VALUES (?, ?, ?, ?)";
    
    $stmt = $pdo->prepare($sql);

    // Execute query and return success status
    return $stmt->execute([$name, $email, $gender, $dreamjob]);
}

// Fetch all job dreamers
function getAllJobDreamers($pdo) {
    try {
        $sql = "SELECT * FROM jobdreamers";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching job dreamers: " . $e->getMessage();
        exit;
    }
}

// Get a single job dreamer by ID (for updating)
function getJobDreamerById($pdo, $id) {
    try {
        $sql = "SELECT * FROM jobdreamers WHERE jobdreamerID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error fetching job dreamer: " . $e->getMessage();
        exit;
    }
}

// Update job dreamer data
function updateJobDreamer($pdo, $id, $name, $email, $gender, $dreamjob) {
    try {
        $sql = "UPDATE jobdreamers SET name = :name, email = :email, gender = :gender, dreamjob = :dreamjob WHERE jobdreamerID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'name' => $name,
            'email' => $email,
            'gender' => $gender,
            'dreamjob' => $dreamjob
        ]);
        return true;
    } catch (PDOException $e) {
        echo "Error updating job dreamer: " . $e->getMessage();
        return false;
    }
}

// delete function (implement as needed)
function deleteJobDreamer($pdo, $id) {
    try {
        $sql = "DELETE FROM jobdreamers WHERE jobdreamerID = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    } catch (PDOException $e) {
        echo "Error deleting job dreamer: " . $e->getMessage();
        return false;
    }
}
?>