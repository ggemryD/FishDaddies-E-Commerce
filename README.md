 # FishDaddies 🐟

 FishDaddies is a PHP/MySQL web application for an online ornamental fish shop.  
 It provides a complete shopping experience for customers (products, cart, checkout, care and grooming guides) and an admin dashboard for managing products, orders, users, and messages.

 ## Table of Contents
 - [Features](#features)
 - [Tech Stack](#tech-stack)
 - [Project Structure](#project-structure)
 - [Getting Started](#getting-started)
   - [Prerequisites](#prerequisites)
   - [Installation](#installation)
   - [Database Setup](#database-setup)
   - [Running the App](#running-the-app)
 - [Usage](#usage)
   - [User Side](#user-side)
   - [Admin Side](#admin-side)
 - [Key Pages](#key-pages)
 - [Styling and Assets](#styling-and-assets)
 - [Security Notes](#security-notes)
 - [Future Improvements](#future-improvements)

 ## Features

 ### User Side
 - Browse fish products by category (Betta, Goldfish, Guppy, Koi, etc.).
 - View detailed product information and images.
 - Add products to cart and update quantities.
 - View cart summary and grand total.
 - Proceed through a checkout flow.
 - Register and log in as a customer.
 - View orders history.
 - Access **Care Guides** for different fish species.
 - Access **Grooming Guides** with a separate themed experience.

 ### Admin Side
 - Admin authentication using predefined credentials.
 - Manage products (create, update, delete, upload images).
 - View and manage customer orders.
 - View and manage registered users.
 - View contact messages from users.
 - Dashboard overview for quick access to management pages.

 ## Tech Stack

 - **Backend:** PHP (procedural, mysqli)
 - **Database:** MySQL (`shop_db`)
 - **Web Server:** Apache (via XAMPP)
 - **Frontend:** HTML5, CSS3, JavaScript
 - **UI Libraries:**
   - [Font Awesome](https://fontawesome.com/) (icons)
   - [Boxicons](https://boxicons.com/) (icons)
   - [Swiper.js](https://swiperjs.com/) (carousels in home and guides)
 - **Styling Helpers:**
   - Custom SCSS (compiled into `assets/css/styles.css` and `groom/css/styles.css`)

 ## Project Structure

 At a high level:

 - `config.php` – Database connection and admin credential setup.
 - `database/shop_db.sql` – SQL dump of the database schema and seed data.
 - `home.php` – Main landing page for users.
 - `shop.php` – Product listing page.
 - `product_details.php` / `product_detailss.php` – Individual product detail pages.
 - `cart.php` – Shopping cart page.
 - `checkout.php` – Checkout page.
 - `orders.php` – User orders listing page.
 - `login.php` / `register.php` – Authentication for customers.
 - `admin_page.php` – Admin dashboard home.
 - `admin_products.php` – Admin product management.
 - `admin_orders.php` – Admin orders management.
 - `admin_users.php` – Admin users list.
 - `admin_contacts.php` – Admin view of contact form messages.
 - `careguides.php` – Entry point for fish care guides.
 - `groomingguides.php` – Entry point for grooming guides.

 Supporting directories:

 - `css/` – Page-level CSS (cart, checkout, login, register, admin, etc.).
 - `assets/` – Main site assets (global styles, images, JS).
 - `groom/` – Separate styling and assets for grooming guides section.
 - `careguides/` – CSS for care & grooming guide pages.
 - `image/` – General images (backgrounds, logos, icons).
 - `uploaded_img/` – Product images uploaded and referenced from the database.
 - `js/` – Frontend scripts (e.g. `script.js`, `admin_script.js`).

 ## Getting Started

 ### Prerequisites

 - [XAMPP](https://www.apachefriends.org/) (or any stack with Apache, PHP 7+ and MySQL)
 - PHP 7.4+ recommended
 - MySQL 5.7+ / MariaDB compatible server
 - A web browser (Chrome, Edge, Firefox, etc.)

 ### Installation

 1. Copy the `FishDaddies` project folder into your web server root:
    - For XAMPP on Windows: `C:\xampp\htdocs\FishDaddies`
 2. Ensure Apache and MySQL are both running in the XAMPP Control Panel.

 ### Database Setup

 1. Open `phpMyAdmin` (e.g. http://localhost/phpmyadmin).
 2. Create a new database named `shop_db`.
 3. Import the SQL dump:
    - Go to the `shop_db` database.
    - Click the **Import** tab.
    - Select `database/shop_db.sql` from the project folder.
    - Click **Go** to import tables and data.

 The database connection is configured in [`config.php`](file:///c:/xampp/htdocs/FishDaddies/config.php):

 ```php
 $servername = "localhost";
 $username   = "root";
 $password   = "";
 $dbname     = "shop_db";

 $conn = new mysqli($servername, $username, $password, $dbname);
 ```

 Adjust these values if your local MySQL credentials differ.

 ### Running the App

 1. Start Apache and MySQL in XAMPP.
 2. Open your browser and navigate to:
    - `http://localhost/FishDaddies/home.php` – main user homepage.
    - or simply `http://localhost/FishDaddies/` if your environment auto-loads `home.php`.

 ## Usage

 ### User Side

 - **Browse products:**
   - Visit `home.php` or `shop.php` to see available fish products.
   - Filter/browse by species-specific pages (e.g. `betta_product.php`, `goldfish_product.php`, `guppy_product.php`, `koi_product.php`).

 - **Cart & checkout:**
   - Add items from product pages to the cart (`add_to_cart.php` handles the action).
   - Manage the cart in [`cart.php`](file:///c:/xampp/htdocs/FishDaddies/cart.php):
     - Increase/decrease quantity.
     - Remove single items or clear the entire cart.
     - View per-item subtotal and grand total.
   - Proceed to [`checkout.php`](file:///c:/xampp/htdocs/FishDaddies/checkout.php) to place an order.

 - **Account & orders:**
   - Register via [`register.php`](file:///c:/xampp/htdocs/FishDaddies/register.php).
   - Log in via [`login.php`](file:///c:/xampp/htdocs/FishDaddies/login.php).
   - View your orders on [`orders.php`](file:///c:/xampp/htdocs/FishDaddies/orders.php).

 - **Care Guides:**
   - Access via [`careguides.php`](file:///c:/xampp/htdocs/FishDaddies/careguides.php).
   - View species-specific guides:
     - [`cbetta.php`](file:///c:/xampp/htdocs/FishDaddies/cbetta.php)
     - [`cgoldfish.php`](file:///c:/xampp/htdocs/FishDaddies/cgoldfish.php)
     - [`cguppy.php`](file:///c:/xampp/htdocs/FishDaddies/cguppy.php)
     - [`ckoi.php`](file:///c:/xampp/htdocs/FishDaddies/ckoi.php)
   - Each guide uses an accordion layout for topics (tank setup, water quality, feeding, etc.).

 - **Grooming Guides:**
   - Access via [`groomingguides.php`](file:///c:/xampp/htdocs/FishDaddies/groomingguides.php).
   - Species-specific grooming pages:
     - [`gbetta.php`](file:///c:/xampp/htdocs/FishDaddies/gbetta.php)
     - [`ggoldfish.php`](file:///c:/xampp/htdocs/FishDaddies/ggoldfish.php)
     - [`gguppy.php`](file:///c:/xampp/htdocs/FishDaddies/gguppy.php)
     - [`gkoi.php`](file:///c:/xampp/htdocs/FishDaddies/gkoi.php)

 ### Admin Side

 The admin section is intended for shop owners/managers.

 - **Admin URL:** typically [`admin_page.php`](file:///c:/xampp/htdocs/FishDaddies/admin_page.php) or via a link after logging in as admin.
 - **Admin credentials** are defined in [`config.php`](file:///c:/xampp/htdocs/FishDaddies/config.php):

   ```php
   define('ADMIN_EMAIL', 'admin@gmail.com');
   define('ADMIN_PASSWORD', md5('admin'));
   ```

   Ensure the admin user in the database matches this configuration or your login logic.

 - **Admin features:**
   - Product management in [`admin_products.php`](file:///c:/xampp/htdocs/FishDaddies/admin_products.php)
     - Add/edit/delete products.
     - Upload product images (stored in `uploaded_img/`).
   - Order management in [`admin_orders.php`](file:///c:/xampp/htdocs/FishDaddies/admin_orders.php)
     - View all customer orders and status.
   - User management in [`admin_users.php`](file:///c:/xampp/htdocs/FishDaddies/admin_users.php)
     - View registered customers.
   - Contact messages in [`admin_contacts.php`](file:///c:/xampp/htdocs/FishDaddies/admin_contacts.php)
     - View messages submitted from contact forms.

 ## Key Pages

 - Main site:
   - Home: [`home.php`](file:///c:/xampp/htdocs/FishDaddies/home.php)
   - Shop: [`shop.php`](file:///c:/xampp/htdocs/FishDaddies/shop.php)
   - Cart: [`cart.php`](file:///c:/xampp/htdocs/FishDaddies/cart.php)
   - Checkout: [`checkout.php`](file:///c:/xampp/htdocs/FishDaddies/checkout.php)
   - Orders: [`orders.php`](file:///c:/xampp/htdocs/FishDaddies/orders.php)
   - Contact: [`contact.php`](file:///c:/xampp/htdocs/FishDaddies/contact.php)
   - Search: [`search_page.php`](file:///c:/xampp/htdocs/FishDaddies/search_page.php)

 - Auth:
   - Login: [`login.php`](file:///c:/xampp/htdocs/FishDaddies/login.php)
   - Register: [`register.php`](file:///c:/xampp/htdocs/FishDaddies/register.php)
   - Logout: [`logout.php`](file:///c:/xampp/htdocs/FishDaddies/logout.php)

 - Admin:
   - Dashboard: [`admin_page.php`](file:///c:/xampp/htdocs/FishDaddies/admin_page.php)
   - Products: [`admin_products.php`](file:///c:/xampp/htdocs/FishDaddies/admin_products.php)
   - Orders: [`admin_orders.php`](file:///c:/xampp/htdocs/FishDaddies/admin_orders.php)
   - Users: [`admin_users.php`](file:///c:/xampp/htdocs/FishDaddies/admin_users.php)
   - Contacts: [`admin_contacts.php`](file:///c:/xampp/htdocs/FishDaddies/admin_contacts.php)

 ## Styling and Assets

 - Global styles for the main site live in:
   - [`assets/css/styles.css`](file:///c:/xampp/htdocs/FishDaddies/assets/css/styles.css)
   - [`css/style.css`](file:///c:/xampp/htdocs/FishDaddies/css/style.css)
 - Page-specific CSS includes:
   - [`css/cart.css`](file:///c:/xampp/htdocs/FishDaddies/css/cart.css)
   - [`css/checkout.css`](file:///c:/xampp/htdocs/FishDaddies/css/checkout.css)
   - [`css/login.css`](file:///c:/xampp/htdocs/FishDaddies/css/login.css)
   - [`css/register.css`](file:///c:/xampp/htdocs/FishDaddies/css/register.css)
   - [`css/admin_products.css`](file:///c:/xampp/htdocs/FishDaddies/css/admin_products.css)
   - [`css/admin_style.css`](file:///c:/xampp/htdocs/FishDaddies/css/admin_style.css)
   - [`css/orders.css`](file:///c:/xampp/htdocs/FishDaddies/css/orders.css)
 - Care and grooming guides styling:
   - [`careguides/betta.css`](file:///c:/xampp/htdocs/FishDaddies/careguides/betta.css)
   - [`careguides/guppy.css`](file:///c:/xampp/htdocs/FishDaddies/careguides/guppy.css)
 - Grooming section styles:
   - [`groom/css/styles.css`](file:///c:/xampp/htdocs/FishDaddies/groom/css/styles.css)

 ## Security Notes

 - The project is designed for a learning/demo environment.
 - If deploying publicly, you should:
   - Use strong, unique admin credentials (update `ADMIN_EMAIL` and `ADMIN_PASSWORD`).
   - Ensure all user inputs are properly validated and sanitized.
   - Use prepared statements for SQL queries throughout the codebase.
   - Serve the site over HTTPS in production.
   - Limit direct access to admin pages (e.g. additional auth checks or IP restrictions).

 ## Future Improvements

 Some ideas to extend or improve this project:

 - Add pagination and advanced filtering to the shop page.
 - Implement order status updates and tracking on the user side.
 - Add user profile management (address book, saved payment info, etc.).
 - Add image optimization and lazy loading for faster page loads.
 - Replace plain PHP templates with a templating engine or a PHP framework.
 - Add unit tests or integration tests for key flows (cart, checkout, admin).

 ---

 This README is tailored to the current structure under `c:\xampp\htdocs\FishDaddies`.  
 Adjust paths and configuration details if you move the project to a different environment.

