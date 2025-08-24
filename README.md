# Employee Onboarding System

A simple **web-based employee onboarding system** built with **HTML**, **CSS**, **JavaScript**, **PHP**, and **MySQL**. 
This application allows HR personnel to register new employees, manage employee records, and view individual employees, manage employee records, and view individual employee profiles in a simple dashboard.

## Features

- **Landing Page** - entry point to the system.
- **Employee Registration** - add new employees with: 
    - Full Name
    - Email
    - Position
    - Department
    - Start Date
- **Employee List Page** - view all registered employees in a table with columns:
    - ID
    - Name
    - Position
    - Department
    - Start Date
    - Actions (View | Update | Delete)
- **Employee Profile Page** - view detailed profile of a single employee.
- **Update and Delete Functions** modify employee details or remove records.

## Tech Stack

-- **Frontend:** HTML, CSS, JavaScript
-- **Backend:** PHP
-- **Database:** MySQL

## Installation

1. **Clone the repository**

2. **Move into the project directory**

3. **Set up the database**
    - Create a new MySQL database (eg., onboarding_db)

4. **Configure database connection**
    - Open config.php
    - Update it with: 
        - Database name
        - Username
        - Password
        - Host

5. Run the application
    - If using XAMPP (which I am using)
        - Place the project folder inside htdocs
        - Start Apache and MySQL
        - Visit http://localhost/employee-onboarding-system in your browser.


## Usage

1. Visit the landing page: 
    https://localhost/employee-onboarding-system

2. Press the "Get Started" button to go to the Registration Page

3. After registering, you are redirected to the Employees List Page showing all employees.

4. Use the Actions column to:
    - View employee profile
    - Update employee details
    - Delete employee record

