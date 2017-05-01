<?
$data = implode(' ', array_slice($argv, 1));

if(empty($data)) $data = "Hello World!";

$msg = new AMQPMessage($data,
                        array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
                      );

$channel->basic_publish($msg, '', 'task_queue');

echo " [x] Sent ", $data, "\n";