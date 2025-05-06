CREATE DATABASE feedback_system;

USE feedback_system;

CREATE TABLE questions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question_text TEXT NOT NULL,
    question_type ENUM('star', 'yesno', 'text') NOT NULL
);
