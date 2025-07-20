A Shopware plugin that alerts when a product's stock is below 15 units.

Features

    Checks the stock level of products in the database.
    Logs an alert message if stock is below 15.

Requirements
    PHP 8+
    Shopware Core
    Doctrine DBAL
    PSR Logger Interface

Installation
    Clone or download this repository.
    Run composer install to install dependencies.
    Make sure your database has the required product table (see below).
    Run the plugin or include it in your Shopware environment.

Database Setup
You can create the product table by running the following SQL:

sql
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_number VARCHAR(100) NOT NULL UNIQUE,
    stock INT NOT NULL
);
Usage
Call the checkLowStock() method of the StockAlertService class to log alerts for products with low stock.

Example:

php
$stockAlertService->checkLowStock();
