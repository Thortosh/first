<?php
function renderTamplate($a, $b)
{
    if (!file_exists($a)) {
        return 'netu';
    } else {
        ob_start();
        extract($b);
        require_once($a);
        return ob_get_clean();

    }
}