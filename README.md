# E-commerce Store (PHP & MySQL)

A full-stack e-commerce web application built with core PHP and MySQL, with a customer storefront, customer account area, and an admin panel for managing products, categories, sliders, orders, and payments.

![PHP](https://img.shields.io/badge/PHP-777BB4?logo=php&logoColor=white) ![MySQL](https://img.shields.io/badge/MySQL-4479A1?logo=mysql&logoColor=white) ![Bootstrap](https://img.shields.io/badge/Bootstrap-4-7952B3?logo=bootstrap&logoColor=white) ![jQuery](https://img.shields.io/badge/jQuery-0769AD?logo=jquery&logoColor=white)

## Overview

Built in 2021 as a learning project covering the complete flow of an online shop in procedural PHP: catalog, cart, registration, checkout, offline payment confirmation, and back-office CRUD. It is meant as a portfolio and study piece, not a production store (see [Security Notes](#security-notes)).

## Features

**Storefront**

- Homepage with admin-managed image slider and latest products
- Shop page with filtering by product category and category
- Product details with size and quantity selection
- Cart linked to the visitor's IP address, with item count and total price
- Checkout that requires a customer login
- Customer registration with profile image upload
- Contact form that emails the store and sends an auto-reply via PHP `mail()`

**Customer area** (`customer/`)

- Login / logout
- My orders with invoice number, amount, and status
- Pay offline instructions and payment confirmation form (invoice, amount, method, transaction reference, date)
- Edit account details, change password, delete account

**Admin panel** (`admin_area/`)

- Session-protected admin login
- Dashboard with counts of products, customers, product categories, and orders, plus admin profile
- Products: insert (TinyMCE description editor), view, edit, delete
- Product categories and categories: insert, view, edit, delete
- Homepage slider: insert, view, edit, delete
- Customers, orders, and payments: view and delete
- DataTables listings with export buttons

## Tech Stack

- PHP (procedural, `mysqli`)
- MySQL / MariaDB
- HTML5, CSS3, Bootstrap 4
- jQuery, Owl Carousel, DataTables, TinyMCE, Font Awesome

## Getting Started

### Prerequisites

- PHP 7+ with `mysqli`
- MySQL or MariaDB
- XAMPP, WAMP, MAMP, Laragon, or a similar local stack

### Installation

1. Clone into your web root:

   ```bash
   git clone https://github.com/coderasraf/ecom.git
   ```

2. Create a MySQL database named `ecom`. No SQL dump is included; the code uses these tables:
   `admins`, `customers`, `products`, `product_category`, `categories`, `slider`, `cartitem`, `customer_order`, `pending_order`, `payments`.
3. The connection is defined in three places; update all of them if your credentials differ:
   - `includes/db.php`
   - `admin_area/includes/db.php`
   - `customer/includes/db.php`

   ```php
   $con = mysqli_connect("localhost", "root", "", "ecom");
   ```

4. Insert an admin row into `admins` (`admin_email`, `admin_pass`) to sign in.
5. Open:
   - Store: `http://localhost/ecom/`
   - Admin: `http://localhost/ecom/admin_area/login.php`

## Project Structure

```text
ecom/
├── index.php, shop.php, details.php, cart.php
├── checkout.php, order.php, payment_option.php
├── customer_registration.php, contact.php, Logout.php
├── functions/functions.php   # Catalog, cart and pricing helpers
├── includes/                 # db.php, header, footer, sidebar
├── customer/                 # Customer account area
│   ├── my_account.php, my_order.php, pay_offline.php, confirm.php
│   └── edit_act.php, change_pass.php, delete_ac.php
├── admin_area/               # Admin panel (index.php loads pages via query keys, e.g. ?view_product)
│   └── insert_*, view_*, edit_*, delete_* pages
└── assets/                   # CSS, JS, DataTables, TinyMCE
```

## Security Notes

- Customer and admin passwords are stored and compared in plain text; use `password_hash()` / `password_verify()`.
- SQL is built by string concatenation; switch to prepared statements.
- Add CSRF protection and stricter upload validation before any real use.

## Author

Built by **Ashraf Siddik**, Shopify developer & CRO specialist.
- Website: [ashraf-siddik.com](https://ashraf-siddik.com)
- GitHub: [@coderasraf](https://github.com/coderasraf)
