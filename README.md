# 🚗 Car Rental Booking System

A PHP & MySQL web-based car rental booking application developed as a term project.  
The system supports user registration, car searching, reservations, and admin management.

---

## 📌 Features

### User
- Register and login
- View user profile
- Search available cars
- Book car reservations

### Admin
- View all registered users
- View all reservations

---

## 🛠️ Tech Stack

- PHP
- MySQL
- HTML & CSS
- Apache (XAMPP / MAMP / WAMP)

---

## 📂 Project Structure

car-rental/
│── db.php
│── index.php
│── register.php
│── dashboard.php
│── profile.php
│── search.php
│── book.php
│── logout.php
└── admin/
├── users.php
└── reservations.php


---

## 🚀 Setup

1. Clone the repository  
git clone https://github.com/yourusername/car-rental-booking.git
2. Place project in `htdocs`
3. Import the database SQL file
4. Start Apache & MySQL
5. Open:
http://localhost/car-rental

---

## 🔐 Admin Access

Set a user as admin:
UPDATE users SET role='admin' WHERE email='admin@example.com';

---

## 📄 Course Context

Developed for a Web-Based Application Development / Database Systems course.

---

## 👨‍💻 Author

Group21
Computer Science — NJIT
