<?php
function renderTamplate($a, $b)
{
    if (!file_exists($a)) {
        return 'template not found';
    } else {
        ob_start();
        extract($b);
        require_once("$a");
        return ob_get_clean();
    }
}

function price_ceil($a)
{
    $ceil = ceil($a);
    if ($ceil <= 1000) {
        return $ceil;
    } else {
        $format = number_format($ceil, 0, ' ', ' ');
        return $format;
    }
}

function redirect($a)
{
    header('Location: /' . $a);
    exit();
}

