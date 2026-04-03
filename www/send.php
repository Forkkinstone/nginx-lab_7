<?php
require_once __DIR__ . '/vendor/php-amqplib/PhpAmqpLib/autoload.php';
use App\QueueManager;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $q = new QueueManager();
    $data = [
        'name' => $_POST['name'] ?? 'Аноним',
        'time' => date('H:i:s'),
        'status' => 'pending'
    ];
    
    $q->publish($data);
    echo "✅ Задача для " . htmlspecialchars($data['name']) . " добавлена в очередь!<br>";
    echo "<a href='index.php'>Назад</a>";
}
