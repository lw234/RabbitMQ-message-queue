<?php
require_once ('vendor/autoload.php');
use PhpAmqpLib\Connection\AMQPConnection;
use PhpAmqpLip\Message\AMQPMessage;
// create a connection to the server 
$connection = new AMQPConnection('localhost', 80, 'guest', 'guest');
$channel = $connection->channel();

// create a channel and declare a queue for us to send to
$channel->queue_declare('hello', false, false, false, false);
$msg = new AMQPMessage('Hello World!');
$channel->basic_publish($msg, '', 'hello');

echo " [x] Sent 'Hello World!'\n";

// close the channel 
$channel->close();
$connection->close();
?>

