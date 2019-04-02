<?php
//header('Content-Type: text/html; charset=utf-8');


return [
    [ // добавить поля из ДЗ6 задание 2 и статус (открыто/закрыто)
        'id' => 0, //integer primary unique
        'title' => 'Доски и лыжи', // string, varchar()
        'name' => '2014 Rossignol District Snowboard',
        'path' => '/img/lot-1.jpg',
        'price' => '10999', // integer, float, double ...
        'message' =>'Описание лота'
    ],
    [
        'id' => 1,
        'title' => 'Доски и лыжи',
        'name' => 'DC PLY MENS 2016/2017 Snowboard',
        'path' => '/img/lot-2.jpg',
        'price' => '159999',
        'message' =>'Описание лота'

    ],
    [
        'id' => 2,
        'title' => 'Крепления',
        'name' => 'Крепления Unlon Contact Pro 2015 года размер L/XL',
        'path' => '/img/lot-3.jpg',
        'price' => '8000',
        'message' =>'Описание лота'

    ],
    [
        'id' => 3,
        'title' => 'Ботинки',
        'name' => 'Ботинки',
        'path' => '/img/lot-4.jpg',
        'price' => '109999',
        'message' =>'Описание лота'
    ],
    [
        'id' => 4,
        'title' => 'Одежда',
        'name' => 'Куртка для сноуборда',
        'path' => '/img/lot-5.jpg',
        'price' => '7500',
        'message' =>'Описание лота'
    ],
    [
        'id' => 5,
        'title' => 'Разное',
        'name' => 'Маска Oakley',
        'path' => '/img/lot-6.jpg',
        'price' => '5400',
        'message' =>'Описание лота'
    ],
];


//foreach ($catalog as $item) {
//    var_dump($item['name']);
//}