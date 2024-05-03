# **Laravel 11 CMS: Landing Page Management System**

## Overview

This project is a comprehensive Content Management System (CMS) developed using Laravel 11. It facilitates the management of landing pages and provides insightful statistics. Users can easily create, duplicate, delete, or view landing pages within the system. The dashboard offers an overview of key statistics, including purchase tracking (number of sales, revenue generated), course analytics (completion rates, popularity), and payment tracking, along with client management capabilities.

## Features

- **Landing Page Management**: Easily manage landing pages with features such as duplication, deletion, and visualization.
  
- **Dashboard with Key Statistics**: Gain insights into important metrics, including purchase tracking, course analytics, and payment tracking.

- **Client Management**: Manage client information and interactions within the system.

- **Notification Management**: Receive contact notifications via Gmail directly from the dashboard.

## Technologies Used

- **Backend**: 
  - Laravel 11: A PHP framework known for its robustness and flexibility.

- **Frontend**:
  - Tailwind CSS: A utility-first CSS framework for quickly styling web applications.

- **Database**:
  - MySQL: A relational database management system for storing and retrieving data.

## How to Use

1. **Installation**: 
   - Clone the repository: `git clone <repository-url>`
   - Install PHP dependencies: `composer install`
   - Install JavaScript dependencies: `npm install`

2. **Database Setup**: 
   - Set up your MySQL database.
   - Configure the database connection in the `.env` file.

3. **Compile Frontend Assets**: 
   - Run `npm run dev` to compile the frontend assets using Laravel Mix.

4. **Start the Development Server**: 
   - Run `php artisan serve` to start the Laravel development server.

5. **Explore the Dashboard**: 
   - Access the dashboard to manage landing pages, view statistics, and handle client interactions.

## Email Notifications

This project utilizes Laravel's built-in Mail service for sending email notifications. Notifications such as contact form submissions or other important updates can be configured to be sent to specified email addresses directly from the dashboard.

To configure email notifications:
- Set up your SMTP mail driver in the `.env` file.
- Customize the email templates located in the `resources/views/emails` directory.

## Additional Information

If you're interested in contributing to or learning more about the project, feel free to explore the codebase. Contributions and feedback are welcome!
