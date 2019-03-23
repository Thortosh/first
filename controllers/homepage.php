<?php


function homepage()
{
    $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное',];
    $catalog = include 'arr.php';
    return renderTamplate('templates/index.php', [
        'catalog' => $catalog,
        'categories' => $categories
    ]);
}
