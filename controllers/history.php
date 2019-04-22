<?php
function history()
{
    if (isset($_SESSION['user'])) {
        include 'arr.php';
        return renderTamplate('templates/history.php',
            [
                'catalog' => $catalog
            ]);
    } else {
        return 'not fount';
    }
}