![Cinemat Logo](./public/images/branding/logos/logo-w.png)

# About Project

Cinemat is a ticket reservation system developed using Laravel 8. It has features like user roles, authentication, automated reservations, and much more.
See the live demo **[here](https://cinemat.zeiadmohamed.dev)**.

## What I learned

-   Routing basics
-   MVC architecture
-   Blade templating language
-   Middlewares
-   Authentication and authorization basics
-   Relational databases (MySQL)
-   Database migrations
-   Eloquent ORM
-   Database CRUD operations
-   HTML, CSS, JS
-   Alpine.js
-   File uploads
-   Searching and filtering through models

## Usage

You can find a link to the website **[here](https://cinemat.zeiadmohamed.dev)**. The website has some movies already created, but you can log in as a manager and edit or create new movies. **[login](https://cinemat.zeiadmohamed.dev/login)**

> Note: The website resets automatically every 30 minutes.

### Credentials

| User Role | Email                        | Password     |
| --------- | ---------------------------- | ------------ |
| Admin     | admin&#64;cinemat&#46;com    | adminpass    |
| Manager   | manager&#64;cinemat&#46;com  | managerpass  |
| Customer  | customer&#64;cinemat&#46;com | customerpass |

<br>

---

<br>

## Installation Instructions

<br>

1. Clone the repository by running the following command in your terminal or command prompt:
    ```bash
    git clone https://github.com/ziadabdo98/Cinemat.git
    ```
2. Change into the project directory:
    ```bash
    cd Cinemat
    ```
3. Install the project dependencies using Composer. Ensure you have Composer installed on your machine. Run the following command:
    ```bash
    composer install
    ```
4. Create a copy of the .env.example file, name it .env, and enter database credentials:
    ```bash
    cp .env.example .env
    ```
5. Generate an application key:
    ```bash
    php artisan key:generate
    ```
6. Configure the .env file. Open the .env file in a text editor and set the necessary configuration options, such as database credentials and application-specific settings.
7. Run the database migrations to create the required tables:
    ```bash
    php artisan migrate
    ```
8. Optionally, seed the database with 20 movies, shows, users, and categories:
    ```bash
    php artisan db:seed
    ```
9. Create a symbolic link from public/storage to storage/app/public by:
    ```bash
    php artisan storage:link
    ```
    The Laravel application will be accessible at the specified URL (usually http://localhost:8000).
10. Finally, you can start the local development server:
    ```bash
    php artisan serve
    ```
    The Laravel application will be accessible at the specified URL (usually http://localhost:8000).

<br>

## User Roles

<br>

**Administrator:**

-   Manages users' creation and website authorities
-   Accepts requests from managers to become managers
-   Can delete existing users

**Manager:**

-   Responsible for managing, creating, and modifying movie details
-   Responsible for managing, creating, and modifying shows
-   Can update information such as title, date, start and end time, screening room, and poster image
-   Can view the overall seat status for each show (vacant/reserved)

**Customers:**

-   Registered users who have provided their personal data
-   Can reserve movie tickets
-   Able to reserve any number of tickets for non-clashing movies

**Guests:**

-   Unregistered or non-logged-in users
-   Can view current movies' details
-   Can log in or register (sign up) as a customer
-   Unable to reserve tickets
