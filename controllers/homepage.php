<?php

function homepage($catalog, $categories)
{
   return renderTamplate('templates/index.php', [
        'catalog' => $catalog,
        'categories' => $categories
    ]);
}
