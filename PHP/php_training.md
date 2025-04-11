# PHP Training (10 Days)

## Exercise 1: Core PHP & MySQL Basics

- Learn about:
  - Core PHP
  - MySQL
  - Sessions and Cookies
  - HTML & CSS
- Create an HTML form using all essential elements:
  - Textbox
  - Select
  - Radio buttons
  - Textarea, etc. (Include basic design)
- Perform CRUD operations:
  - Insert, Update, Delete data with Grid Table display
- Form validations:
  - HTML5 form validation
  - PHP form validation
- Display success or error messages on actions (e.g., Add, Delete)

---

## Exercise 2: JavaScript, jQuery & AJAX

- Learn and implement:
  - JavaScript
  - jQuery
  - JavaScript Validation (Attach to your PHP form)
  - jQuery Validation (Attach to your PHP form)
- Introduction to AJAX and its use
- Implement editable Grid with AJAX:
  - Insert, Update, Delete data
  - Example: [Live Editable Table](https://www.phpzag.com/demo/create-live-editable-table-with-jquery-php-and-mysql/)

---

## Exercise 3: OOP in PHP

- Learn Object-Oriented Programming concepts in PHP:
  - Classes and Functions
  - CRUD operations using OOP functions

---

## Exercise 4: Employee Record Management System (ERMS)

> **Goal:** Manage employee data such as personal details, education, work experience, etc., and reduce manual paperwork. Enables centralized online employee data management.

### Modules

#### User Module
- Register
- Login
- Password Recovery
- Add/Edit:
  - Work Experience
  - Education Details
  - Profile
- Update Password
- Logout

#### Admin Module
- Admin Login
- Manage employee records:
  - View, Update, Edit: Personal, Work Experience, Education
- Update own profile
- Change Password
- Logout

### Reference Screenshots
- ![Screenshot 1](https://prnt.sc/r1qk5c)
- ![Screenshot 2](https://prnt.sc/r1qkk7)
- ![Screenshot 3](https://prnt.sc/r1qkqp)
- ![Screenshot 4](https://prnt.sc/r1qllw)
- ![Screenshot 5](https://prnt.sc/r1qlsm)
- ![Screenshot 6](https://prnt.sc/r1qm8b)

---

# Final Project: Student Management System

## Core Features

- Header/Footer with menu:
  - **Home | Login | Student Data | My Profile | Logout**
- Landing page starts with **Login**:
  - Left: Welcome Section
  - Right: Login Form

## Registration
- Link available from the login page
- Include:
  - jQuery Validation
  - PHP Server-Side Validation
  - User Role dropdown (Student, Admin, Super Admin)

## Role-Based Access
- **Student:**
  - Can only view and update own profile
  - No data grid access
- **Admin:**
  - Can view data grid
  - Cannot delete or modify other users’ data
  - Can update their own product info
- **Super Admin:**
  - Full access to data grid
  - Can delete/modify records
  - Can update their own product info

## Data Grid Requirements
- Add **Search Bar** (using jQuery) for filtering data
- Default data sorting: **Descending (Newest First)**
- Include **Ascending/Descending** sort functionality
- **Confirmation Box** before deleting a record
- Fix **Image Upload** issue (for both registration and updates)
- Ensure **Responsive Design** throughout
- Show currently logged-in username at top-right of header
- Implement **Pagination** in the grid
- Improve UI with modern, attractive design

---
