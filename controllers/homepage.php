<?php

function homepage()
{
    $categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное',];
    include 'arr.php';
    //var_dump($catalog);
    return renderTamplate('templates/index.php', [
        'catalog' => $catalog,
        'categories' => $categories
    ]);

}
