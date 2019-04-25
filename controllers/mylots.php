<?php
function mylots()
{
    if (isset($_SESSION['user'])) {
        include 'arr.php';
        return renderTamplate('templates/my-lots.php',
            [
                'catalog' => $catalog
            ]);
    } else {
        return 'not fount';
    }
}