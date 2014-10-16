<?php

// Include the autoload library and use the necessary classes

require_once __DIR__ . '/vendor/autoload.php';
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLib\Message\AMQPMessage;

// Create a connection to the server

$connection = new AMQPConnection('localhost', 5672, 'guest', 'guest');
$channel = $connection->channel();

// Declare the queue

$channel->queue_declare('hello', false, false, false, false);

$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";

// Close the channel and the connection

$channel->close();
$connection->close();

?>


