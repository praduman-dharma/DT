# PHP REST API for Student Records

This project demonstrates a simple PHP-based REST API for managing student records using a MySQL database. It includes endpoints for CRUD operations and searching students.

---

## API Endpoints

### 1. Fetch All Students
**File:** `api-fetch-all.php`  
**Method:** `GET`  
**Description:** Returns all student records from the database.

#### Example Response:
```json
[
  {
    "id": "1",
    "student_name": "John Doe",
    "age": 22,
    "city": "Delhi"
  },
  ...
]
````

---

### 2. Fetch Single Student

**File:** `api-fetch-single.php`
**Method:** `POST`
**Body:**

```json
{
  "sid": "2"
}
```

**Description:** Fetches a single student record based on the ID.

---

### 3. Insert Student

**File:** `api-insert.php`
**Method:** `POST`
**Body:**

```json
{
  "sname": "Manoj Kumar",
  "sage": 25,
  "scity": "Bhopal"
}
```

**Description:** Inserts a new student record into the database.

---

### 4. Update Student

**File:** `api-update.php`
**Method:** `PUT`
**Body:**

```json
{
  "sid": "2",
  "sname": "Updated Name",
  "sage": 26,
  "scity": "Mumbai"
}
```

**Description:** Updates a student record by ID.

---

### 5. Delete Student

**File:** `api-delete.php`
**Method:** `DELETE`
**Body:**

```json
{
  "sid": "2"
}
```

**Description:** Deletes a student record after validation.

---

### 6. Search Student

**File:** `api-search.php`
**Method:** `GET`
**URL Format:**

```
http://localhost/php-rest-api/api-search.php?search=manoj
```

**Description:** Searches student records based on name using the `LIKE` clause.

---

## Configuration

Ensure the `config.php` file is correctly configured to connect to your MySQL database:

```php
<?php
$conn = mysqli_connect("localhost", "root", "", "php_api") or die("Connection failed");
?>
```

---

## Tools Used

* **PHP (Core)**
* **MySQL**
* **Postman** (For testing)
* **JSON** (Data format)

---

## How to Use

1. Start your local server (e.g., XAMPP).
2. Import the database and table `students`.
3. Place the project folder inside your `htdocs`.
4. Use **Postman** to test the API with correct method and URL.
5. Modify and expand as needed for learning or production use.

---

## Project Structure

```text
php-rest-api/
├── config.php
├── api-fetch-all.php
├── api-fetch-single.php
├── api-insert.php
├── api-update.php
├── api-delete.php
└── api-search.php
```

---
