<?php

// browse
echo '<ul>';
foreach ($this->items as $item) {
    
    echo '<li>';
    $project = htmlspecialchars($item['project'], ENT_QUOTES, 'UTF-8');
    echo "{$project}";
    echo '</li>';

}
echo '</ul>';
?>
