<?php

require 'vendor/autoload.php'; 

use LowStockAlert\Service\StockAlertService;
use Doctrine\DBAL\DriverManager;
use Psr\Log\AbstractLogger;

// Simple Logger to output to console
class ConsoleLogger extends AbstractLogger
{
    public function log($level, $message, array $context = []): void
    {
        echo "[" . strtoupper($level) . "] " . $message . PHP_EOL;
    }
}
$connectionParams = [
        'driver' => 'pdo_sqlite',
    'memory' => true,
];
$conn = DriverManager::getConnection($connectionParams);
$conn->executeStatement('
    CREATE TABLE product (
        id INTEGER PRIMARY KEY,
        product_number VARCHAR(255),
        stock INTEGER
    )
');

$conn->executeStatement("INSERT INTO product (product_number, stock) VALUES ('ABC123', 10), ('DEF456', 20), ('GHI789', 5)");

$logger = new ConsoleLogger();
$stockAlertService = new StockAlertService($conn, $logger);
$stockAlertService->checkLowStock();