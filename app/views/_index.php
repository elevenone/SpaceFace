<?php

use Aura\Html\Escaper as e;

// browse
echo '_index view';
echo '<ul>';
foreach ($this->items as $item) {
    
    echo '<li>';
    
    // $project = e::h($item['project']);
    $project = htmlspecialchars($item['project'], ENT_QUOTES, 'UTF-8');
    echo "{$project}";
    echo '</li>';

}
echo '</ul>';
?>
PAGE VIEW