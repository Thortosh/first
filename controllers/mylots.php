<?php
function mylots()
{

    if (isset($_SESSION['user'])) {
        include 'arr.php';
        $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное',];

        return renderTamplate('templates/my-lots.php',
            compact('catalog', 'categories'));
    } else {
        return 'not fount';
    }
}