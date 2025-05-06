# MySQL Database Guide

## 1. Database Fundamentals

### What is a Database?
A database is an organized collection of structured data stored electronically in a computer system. Databases allow for efficient data storage, retrieval, and management.

**Key Characteristics:**
- Stores data in tables (rows and columns)
- Supports multiple users simultaneously
- Provides data security and integrity
- Allows for efficient querying using SQL

## 2. Accessing MySQL

### phpMyAdmin Configuration
To check MySQL username and password:
1. Navigate to: `xampp/phpmyadmin/config.inc.php`
2. Credentials are typically around line 20

### Command Line Access
```bash
# Change to MySQL binary directory
cd xampp/mysql/bin

# Connect to MySQL server
mysql -u root -p -h localhost
```

**Important Notes:**
- Start MySQL service in XAMPP first
- For Windows, change drive first: `c:`
- To exit MySQL: `Ctrl + C` or type `exit`

## 3. Database Operations

### Viewing Databases
```sql
-- Show all databases
SHOW DATABASES;
```

**Via phpMyAdmin:**
1. Open browser and visit: `http://localhost/phpmyadmin`
2. Ensure XAMPP servers are running

### Creating Databases
```sql
-- Basic syntax
CREATE DATABASE database_name;

-- Example
CREATE DATABASE school_db;

-- Verify creation
SHOW DATABASES;
```

**Via phpMyAdmin:**
1. Click "New" in sidebar
2. Enter database name
3. Click "Create"

### Deleting Databases
```sql
-- Basic syntax (irreversible!)
DROP DATABASE database_name;

-- Example
DROP DATABASE school_db;
```

**Via phpMyAdmin:**
1. Select database
2. Go to "Operations" tab
3. Click "Drop Database"
4. Confirm action

### Using Databases
```sql
-- Select database to work with
USE school_db;

-- Check current database
SELECT DATABASE();
```

## 4. MySQL Data Types

### Numeric Types
- `INT`: Whole numbers (e.g., 25)
- `FLOAT`: Floating-point numbers (e.g., 3.14)
- `DECIMAL`: Precise decimal numbers (e.g., 10.99)

### String Types
- `VARCHAR(n)`: Variable-length strings (e.g., VARCHAR(50))
- `CHAR(n)`: Fixed-length strings
- `TEXT`: Long text data

### Date/Time Types
- `DATE`: YYYY-MM-DD format
- `TIME`: HH:MM:SS format
- `DATETIME`: YYYY-MM-DD HH:MM:SS

## 5. Table Operations

### Creating Tables
```sql
CREATE TABLE students (
    student_id INT NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    age INT,
    enrollment_date DATE,
    PRIMARY KEY (student_id)
);
```

**Best Practices:**
- Use plural names for tables (e.g., `students`)
- Separate column definitions with commas
- Always specify NOT NULL for required fields
- The value is not known.Null doest not mean zero.

### Viewing Table Structure
```sql
-- Show all tables in current database
SHOW TABLES;

-- Describe table structure
DESC students;
-- OR
SHOW COLUMNS FROM students;
```

### Modifying Tables
```sql
-- Add new column
ALTER TABLE students ADD COLUMN email VARCHAR(100);

-- Drop column
ALTER TABLE students DROP COLUMN age;

-- Add default value
ALTER TABLE students MODIFY COLUMN enrollment_date DATE DEFAULT CURDATE();
```

### Deleting Tables
```sql
DROP TABLE students;
```

### Show wrarning of Table
```sql
show warnings;
```

### Show Errors of Table
```sql
show errors;
```

## 6. CRUD Operations

### Create (INSERT)
```sql
-- Insert single record
INSERT INTO students (first_name, last_name, age)
VALUES ('John', 'Doe', 20);

-- Insert multiple records
INSERT INTO students (first_name, last_name, age) VALUES
('Jane', 'Smith', 22),
('Mike', 'Johnson', 21),
('Sarah', 'Williams', 19);
```

### Read (SELECT)
```sql
-- Select all columns
SELECT * FROM students;

-- Select specific columns
SELECT first_name, last_name FROM students;

-- With WHERE clause
SELECT * FROM students WHERE age > 20;

-- With ORDER BY
SELECT * FROM students ORDER BY last_name ASC;

-- With LIMIT
SELECT * FROM students LIMIT 3;
```

### Update (UPDATE)
```sql
-- Update single record
UPDATE students SET age = 23 WHERE student_id = 1;

-- Update multiple records
UPDATE students SET enrollment_date = '2023-09-01' WHERE age < 21;
```

### Delete (DELETE)
```sql
-- Delete specific records
DELETE FROM students WHERE student_id = 3;

-- Delete all records (careful!)
DELETE FROM students;
```

## 7. Advanced Querying

### DISTINCT Clause
```sql
-- Get unique values
SELECT DISTINCT age FROM students;
```

### LIKE Operator
```sql
-- Pattern matching
SELECT * FROM students WHERE first_name LIKE 'J%';  -- Starts with J
SELECT * FROM students WHERE last_name LIKE '%son'; -- Ends with son
```

### LOGICAL Operator
The logical operators are those that are true or false. They return a true or false values to combine one or more true or false values.

```sql
SELECT * FROM students WHERE age > 25;
SELECT * FROM students WHERE age < 25;
SELECT * FROM students WHERE age != 25;
SELECT * FROM students WHERE age <= 25;
SELECT * FROM students WHERE age >= 20 or age <= 25;
SELECT * FROM students WHERE age <= 25 and age >= 22;
SELECT * FROM students WHERE age between 22 and 25;
SELECT * FROM students WHERE age not between 22 and 25;
SELECT * FROM students WHERE fname = 'John' or fname = 'Jerry';
select * from students WHERE fname IN('John','Jerry');
```

### Aggregate Functions
```sql
-- Count records
SELECT COUNT(*) FROM students;

-- Calculate averages
SELECT AVG(age) FROM students;

-- Find minimum/maximum
SELECT MIN(age), MAX(age) FROM students;

-- Calculate sum
SELECT SUM(age) FROM students;
```

### GROUP BY
```sql
-- Group by age
SELECT age, COUNT(*) FROM students GROUP BY age;
```

## 8. Constraints

### Primary Key
The primery key constraint uniquely identifies each record in a table.

```sql
CREATE TABLE courses (
    course_id INT NOT NULL AUTO_INCREMENT,
    course_name VARCHAR(100) NOT NULL,
    PRIMARY KEY (course_id)
);
```

### Foreign Key
A FOREIGN KEY is a key used to link two tables together. A FOREIGN KEY is a field (or collection of fields) in one table that refers to the PRIMARY KEY in another table.

```sql
CREATE TABLE enrollments (
    enrollment_id INT NOT NULL AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    enrollment_date DATE,
    PRIMARY KEY (enrollment_id),
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (course_id) REFERENCES courses(course_id)
);
```

# AUTO_INCREMENT Constraint
Auto increment allows a unique number to be generated automatically when a new record is inserted into table.

### NOT NULL Constraint
```sql
CREATE TABLE teachers (
    teacher_id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,  -- Cannot be NULL
    PRIMARY KEY (teacher_id)
);
```

### DEFAULT Constraint
```sql
CREATE TABLE attendance (
    record_id INT NOT NULL AUTO_INCREMENT,
    student_id INT,
    date DATE DEFAULT CURDATE(),  -- Default to current date
    status VARCHAR(10) DEFAULT 'Present',
    PRIMARY KEY (record_id)
);
```

## 9. Joins

### INNER JOIN
The INNER JOIN keyword selects records that have matching values in both tables.

```sql
SELECT students.first_name, students.last_name, enrollments.enrollment_date
FROM students
INNER JOIN enrollments ON students.student_id = enrollments.student_id;
```

### LEFT JOIN
The LEFT JOIN keyword returns all records from left table (table1), and matched records from the right table (table2). The result is NULL from the right side, if there is no match.

```sql
SELECT students.first_name, courses.course_name
FROM students
LEFT JOIN enrollments ON students.student_id = enrollments.student_id
LEFT JOIN courses ON enrollments.course_id = courses.course_id;
```

### RIGHT JOIN
The RIGHT JOIN keyword returns all records from right table (table1), and matched records from the left table (table2). The result is NULL from the left side, if there is no match.

```sql
SELECT courses.course_name, COUNT(enrollments.student_id)
FROM courses
RIGHT JOIN enrollments ON courses.course_id = enrollments.course_id
GROUP BY courses.course_name;
```

## 10. Useful Functions

### String Functions
```sql
-- Concatenation
SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM students;

-- Case conversion
SELECT UPPER(first_name), LOWER(last_name) FROM students;

-- Length
SELECT CHAR_LENGTH(first_name) FROM students;

-- Reverse
SELECT REVERSE(last_name) FROM students;
```

### Date Functions
```sql
-- Current date/time
SELECT CURDATE(), CURTIME(), NOW();

-- Date formatting
SELECT DATE_FORMAT(enrollment_date, '%W, %M %e %Y') FROM students;

-- Date arithmetic
SELECT DATE_ADD(enrollment_date, INTERVAL 1 MONTH) FROM students;
```

## 11. Best Practices

1. **Naming Conventions**:
   - Use meaningful names (e.g., `student_id` instead of `sid`)
   - Be consistent with naming style (snake_case recommended)

2. **Security**:
   - Always use parameterized queries to prevent SQL injection
   - Limit user privileges (don't always use root)

3. **Performance**:
   - Add indexes to frequently queried columns
   - Normalize your database structure
   - Avoid SELECT * in production queries

4. **Maintenance**:
   - Document your database schema
   - Create regular backups
   - Use transactions for critical operations
