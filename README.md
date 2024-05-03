# **Project Title: Landing Page Management System**

## Overview

Welcome to the Landing Page Management System project! This project consists of two repositories: one for the frontend built with React and Tailwind CSS, and another for the backend built with Laravel 11. The system facilitates the management of landing pages and provides insightful statistics, along with client and email notification management capabilities.

## Frontend Repository

### Description

The frontend repository contains the user interface components built with React and styled using Tailwind CSS. It interacts with the backend API to fetch data and manage the display of landing pages and statistics.

### Technologies Used

- React: A JavaScript library for building user interfaces.
- Tailwind CSS: A utility-first CSS framework for styling web applications.

### How to Use

1. **Installation**: Clone the repository and install dependencies using npm (`npm install`).
2. **Start the Development Server**: Run `npm start` to start the development server.

### Additional Information

Feel free to explore the codebase and contribute to the frontend development.

## Backend Repository

### Description

The backend repository contains the Laravel 11 application responsible for handling data storage, retrieval, and business logic. It includes endpoints for managing landing pages, clients, and email notifications.

### Technologies Used

- Laravel 11: A PHP framework known for its robustness and flexibility.
- MySQL: A relational database management system for storing and retrieving data.

### How to Use

1. **Installation**: Clone the repository and install dependencies using Composer (`composer install`) and npm (`npm install`).
2. **Database Setup**: Set up your MySQL database and configure the connection in the `.env` file.
3. **Compile Frontend Assets**: Run `npm run dev` to compile the frontend assets using Laravel Mix.
4. **Start the Development Server**: Run `php artisan serve` to start the Laravel development server.

### Additional Information

If you're interested in contributing to or learning more about the project, feel free to explore the codebase. Contributions and feedback are welcome!

## Email Notifications

This project utilizes Laravel's built-in Mail service for sending email notifications. Notifications such as contact form submissions or other important updates can be configured to be sent to specified email addresses directly from the dashboard.

To configure email notifications:

- Set up your SMTP mail driver in the `.env` file.
- Customize the email templates located in the `resources/views/emails` directory.
