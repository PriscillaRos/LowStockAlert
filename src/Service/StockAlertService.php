<?php

namespace LowStockAlert\Service;

use Doctrine\DBAL\Connection;
use Psr\Log\LoggerInterface;

class StockAlertService
{
    private Connection $connection;
    private LoggerInterface $logger;

    public function __construct(Connection $connection, LoggerInterface $logger)
    {
        $this->connection = $connection;
        $this->logger = $logger;
    }

    public function checkLowStock(): void
    {
        $sql = "
            SELECT p.id, p.product_number, p.stock
            FROM product p
            WHERE p.stock < 15
        ";

        $lowStockProducts = $this->connection->fetchAllAssociative($sql);

        foreach ($lowStockProducts as $product) {
            $this->logger->info("⚠️ Low stock alert for product {$product['product_number']} (Stock: {$product['stock']})");
        }
    }
}