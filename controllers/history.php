<?php
function history()
{
    $catalog = include 'arr.php';
    return renderTamplate('templates/history.php',
        [
            'catalog' => $catalog
        ]);
}