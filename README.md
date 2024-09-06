# Laravel Task Manager API - Version 1

## Overview
The Task Manager API is a comprehensive solution designed to streamline task management for users. It provides a robust and secure way to manage tasks, categorize them, and filter them based on various criteria. Built with Laravel, this API leverages modern design patterns and tools to deliver a scalable and maintainable application.

## Description
The API allows users to perform CRUD operations on tasks, including creating, reading, updating, and deleting tasks. Tasks are organized into categories, and users can filter tasks by category or due date. The system also supports user authentication and authorization, ensuring secure access to task management features.

## Solution Overview
The solution leverages the following technologies and methodologies to achieve its objectives:
- Laravel: A powerful PHP framework used for building the API, providing a structured and elegant codebase.
- JWT (JSON Web Tokens): Employed for secure authentication and authorization, ensuring that only authorized users can access or modify their tasks.
- Service Layer Design Pattern: Implements a clear separation between the business logic and the controllers, enhancing code maintainability and scalability.
- Traits: Used to encapsulate reusable methods and functionalities, reducing code duplication and promoting code reuse.
  
## Backend Highlights
- API Implementation: Developed using Laravel's robust API features to provide a clean and efficient interface for task management.
- Request Handling: Utilizes Laravel's request validation to ensure data integrity and proper handling of user inputs.
- JWT Authentication: Secures the API endpoints and protects user data by ensuring that only authenticated users can access or manipulate tasks.
- Postman Documentation: Comprehensive API documentation created using Postman, facilitating easy testing and usage of the API endpoints.
  
## Features
- Task Management: Perform CRUD operations on tasks, with fields for title, description, due date, status, and priority.
- Category Management: Organize tasks into categories, with filtering capabilities based on category and due date.
- User Authentication: Secure user login and registration using JWT, with endpoints for login, logout, token refresh, and user profile retrieval.
- Pagination and Filtering: Support for filtering tasks by category and due date, and pagination for efficient task listing.
  
## Technical Choices
- Laravel: Chosen for its elegance, simplicity, and powerful features for building modern web applications.
- JWT for Authentication: Selected for its ability to provide a stateless authentication mechanism, enhancing security and scalability.
- Service Layer Design Pattern: Implemented to maintain a clean separation between business logic and application logic, facilitating easier maintenance and future development.
- Traits: Utilized to promote code reuse and maintain a DRY (Don't Repeat Yourself) codebase, improving overall code quality.
- Postman: Used for API documentation and testing, ensuring that the API endpoints are well-documented and easy to test.
## API Documentation

For detailed information about the API endpoints, including request and response formats, authentication methods, and example payloads, please refer to the comprehensive API documentation available at:

[API Documentation](https://documenter.getpostman.com/view/25951230/2sAXjRUp3r)

## How to Run the Program

1. Clone the repository.
  ```bash
   git clone https://github.com/HebaElshamy/Cart-Pricing-Program.git

```
2.  Install project dependencies using Composer:
   ```bash
   composer install
```

3. Copy the .env.example file and rename it to .env:
 ```bash
    cp .env.example .env
```
4. Generate the application key:
   ```bash
    php artisan key:generate
5. Configure the .env file with your database connection details   
6. Run the database migrations to create tables:
    ```bash
    php artisan migrate

7. Populate the database with the required data.
    ```bash
    php artisan db:seed
8. Start the local server:
    ```bash
    php artisan serve
9. To test the API endpoints, use Postman or any API client of your choice. You can access the API endpoints by sending requests to `http://localhost:8000`. Ensure that you include the appropriate headers and payloads as specified in the [API Documentation](https://documenter.getpostman.com/view/25951230/2sAXjRUp3r).

10. To login as an user, use the following credentials:
    
    - Email: userone@example.com
    - Password: password123
    - Email: usertwo@example.com
    - Password: password123
11. Enjoy your experience!
