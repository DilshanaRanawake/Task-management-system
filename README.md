# Task Management System

## Overview

The **Task Management System** is a web application designed to help users organize and manage their tasks effectively. Built using PHP, MySQL, HTML, CSS, and JavaScript, the system allows users to create, update, delete, and manage tasks while offering features such as user authentication, role-based access control, and notifications.

🚀 **Live Demo**: [https://taskmate.infinityfreeapp.com](https://taskmate.infinityfreeapp.com)

## Table of Contents

- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Features Implementation](#features-implementation)
  - [Admin Authentication](#admin-authentication)
  - [User Authentication](#user-authentication)
  - [User Role Management](#user-role-management)
  - [Task Management](#task-management)
  - [Notifications](#notifications)
- [Screenshots](#screenshots)


## Features

- **User Authentication**: Secure login and registration system for users.
- **User Role Management**: Differentiated access based on user roles (Admin, User).
- **Task Management**: Users can create, view, update, and delete tasks.
- **Task Categories**: Tasks can be categorized for better organization.
- **Notifications**: Users will receive notifications about task updates.
- **Responsive Design**: Mobile-friendly interface for better usability across devices.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL (Managed using phpMyAdmin)

## Installation

1. **Clone the repository:**

```bash
git clone <repository-url>
```

2. **Set up the database using phpMyAdmin:**
   
- Open phpMyAdmin in your browser.
- Create a new database (e.g., task_management_system).
- Import the provided SQL file to create the necessary tables. You can do this by selecting the newly created database, clicking the "Import" tab, and uploading the DB.sql file.
- **Create the Admin User Manually**:
   - Since the admin user is required for managing employee users, you need to create the admin account directly in the database. You can use phpMyAdmin or any MySQL client to execute the following SQL query:

   ```sql
   INSERT INTO users (full_name, username, password, role) 
   VALUES ('Admin', 'admin', MD5('123'), 'admin');
   ```

3. **Configure Database Connection:**
- Edit the DB_connection.php file to set up your MySQL connection. Update the database credentials as necessary.
```bash
$sName = "localhost";        // Database host
$uName = "root";             // Database username
$pass = "";                  // Database password
$db_name = "task_management_db"; // Database name
```
4. **Access the System:**
- Open the project in your browser (e.g., http://localhost/task-management-system).


## Features Implementation

### Admin Authentication
- Admin Login: The admin can log in with the username admin and password 123.
Once logged in, the admin will be able to create and manage employee users.

### User Authentication
#### Admin login credentials -> admin, 123
- Login: Authentication ensures users are logged in before accessing task-related features.
- Logout: Users can log out at any time.

### User Role Management
- Admin Role: Admin users can manage all tasks and users.
- Employee Role: Regular users can only manage their task

### Task Management
- Create Tasks: Admin can add new tasks with descriptions, due dates, assigned user.
- Edit Tasks: Users can update task details(Status of the task)
- Delete Tasks: Admin can delete tasks when no longer needed.
View Tasks: Users can view their tasks in a table format.

### Notifications
Task Updates: Employees receive notifications about important task changes done by admin.

## Screenshots

<p align="center">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/1.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/2.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/3.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/4.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/5.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/6.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/7.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/8.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/9.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/10.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/11.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/12.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/13.png" alt="Example Image" width="500">
  <img src="https://github.com/DilshanaRanawake/Task-management-system/blob/main/images_taskmngmnt/14.png" alt="Example Image" width="500">
</p>



