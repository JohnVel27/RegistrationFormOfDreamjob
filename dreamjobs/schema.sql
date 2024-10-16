CREATE TABLE jobdreamers (
    jobdreamerID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    dreamjob VARCHAR(100) NOT NULL,
    dateadded TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
