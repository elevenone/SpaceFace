<?php

// browse
echo '<h4>projects</h4>';
echo '<ul>';
foreach ($this->items as $item) {
    
    echo '<li>';
    print_r($item['project']);
    echo '</li>';
    //$id = htmlspecialchars($item['id'], ENT_QUOTES, 'UTF-8');
    //$name = htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8');
    //echo "Item ID #{$id} is '{$name}'." . PHP_EOL;

}
echo '</ul>';
?>