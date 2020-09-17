<?php
$id = htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8');
$name = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8')
echo "Item ID #{$id} is '{$name}'." . PHP_EOL;
?>