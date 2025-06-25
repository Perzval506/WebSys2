CREATE TABLE IF NOT EXISTS alumni (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    year_graduated INT,
    course_graduated VARCHAR(100),
    gender VARCHAR(10),
    current_job VARCHAR(100),
    current_employer VARCHAR(100),
    date_added DATETIME DEFAULT CURRENT_TIMESTAMP
);
