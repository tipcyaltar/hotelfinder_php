-- Create database if not exists
CREATE DATABASE IF NOT EXISTS hotelBook;

-- Switch to the created database
USE hotelBook;

-- Create table to store bookings
CREATE TABLE IF NOT EXISTS bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    state VARCHAR(255) NOT NULL,
    hotelname VARCHAR(255) NOT NULL,
    booking_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
