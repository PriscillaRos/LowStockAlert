# LowStockAlert

A Shopware plugin that alerts when a product's stock is below 15 units.

## Features

- Checks the stock level of products in the database.
- Logs an alert message if stock is below 15.

## Requirements

- PHP 8+
- Shopware Core
- Doctrine DBAL
- PSR Logger Interface

## Installation

1. Clone or download this repository.
2. Run `composer install` to install dependencies.
3. Make sure your database has the required `product` table (see below).
4. Run the plugin or include it in your Shopware environment.

Usage
Call the checkLowStock() method of the StockAlertService class to log alerts for products with low stock.
 

    $stockAlertService->checkLowStock();


## Database Setup

You can create the `product` table by running the following SQL:

```sql
CREATE TABLE product (
    id INT PRIMARY KEY AUTO_INCREMENT,
    product_number VARCHAR(100) NOT NULL UNIQUE,
    stock INT NOT NULL
);
