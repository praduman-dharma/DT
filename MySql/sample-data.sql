-- Database creation
CREATE DATABASE IF NOT EXISTS school_db;
USE school_db;

-- Students table
CREATE TABLE students (
    student_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100),
    age INT,
    enrollment_date DATE DEFAULT CURDATE(),
    PRIMARY KEY (student_id)
);

-- Courses table
CREATE TABLE courses (
    course_id INT NOT NULL AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL,
    instructor VARCHAR(100),
    credit_hours INT,
    PRIMARY KEY (course_id)
);

-- Enrollments table
CREATE TABLE enrollments (
    enrollment_id INT NOT NULL AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    enrollment_date DATE DEFAULT CURDATE(),
    grade CHAR(2),
    PRIMARY KEY (enrollment_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);

-- Insert sample data into students
INSERT INTO students (first_name, last_name, email, age, enrollment_date) VALUES
('John', 'Smith', 'john.smith@example.com', 20, '2023-09-01'),
('Emily', 'Johnson', 'emily.johnson@example.com', 21, '2023-09-01'),
('Michael', 'Williams', 'michael.williams@example.com', 19, '2023-09-02'),
('Sarah', 'Brown', 'sarah.brown@example.com', 22, '2023-09-02'),
('David', 'Jones', 'david.jones@example.com', 20, '2023-09-03'),
('Jessica', 'Garcia', 'jessica.garcia@example.com', 21, '2023-09-03'),
('Daniel', 'Miller', 'daniel.miller@example.com', 19, '2023-09-04'),
('Jennifer', 'Davis', 'jennifer.davis@example.com', 22, '2023-09-04');

-- Insert sample data into courses
INSERT INTO courses (course_name, instructor, credit_hours) VALUES
('Introduction to Computer Science', 'Dr. Anderson', 3),
('Calculus I', 'Prof. Wilson', 4),
('English Composition', 'Dr. Thompson', 3),
('General Physics', 'Prof. Roberts', 4),
('World History', 'Dr. Martinez', 3),
('Principles of Economics', 'Prof. Taylor', 3);

-- Insert sample data into enrollments
INSERT INTO enrollments (student_id, course_id, enrollment_date, grade) VALUES
(1, 1, '2023-09-01', 'A'),
(1, 3, '2023-09-01', 'B+'),
(2, 1, '2023-09-01', 'A-'),
(2, 2, '2023-09-01', 'B'),
(3, 4, '2023-09-02', 'C+'),
(3, 5, '2023-09-02', 'A'),
(4, 2, '2023-09-02', 'A'),
(4, 6, '2023-09-02', 'B+'),
(5, 1, '2023-09-03', 'B'),
(5, 4, '2023-09-03', 'A-'),
(6, 3, '2023-09-03', 'B'),
(6, 5, '2023-09-03', 'B+'),
(7, 2, '2023-09-04', 'C'),
(7, 6, '2023-09-04', 'A'),
(8, 1, '2023-09-04', 'A'),
(8, 3, '2023-09-04', 'A-');
