<?php

ini_set('display_errors', 1);
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Europe/Moscow");

$errors = [];

require_once('functions.php');
//require_once('arr.php');
$catalog = include 'arr.php';

$is_auth = (bool)rand(0, 1);
$user_name = 'Константин';
$user_avatar = 'img/user.jpg';
$title = 'PRIVETPAREN';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное',];

//$catalog = [
//    [
//        'id' => 0,
//        'title' => $categories[0],
//        'name' => '2014 Rossignol District Snowboard',
//        'path' => '/img/lot-1.jpg',
//        'price' => '10999'
//    ],
//    [
//        'id' => 1,
//        'title' => $categories[0],
//        'name' => 'DC PLY MENS 2016/2017 Snowboard',
//        'path' => '/img/lot-2.jpg',
//        'price' => '159999'
//
//    ],
//    [
//        'id' => 2,
//        'title' => $categories[1],
//        'name' => 'Крепления Unlon Contact Pro 2015 года размер L/XL',
//        'path' => '/img/lot-3.jpg',
//        'price' => '8000'
//
//    ],
//    [
//        'id' => 3,
//        'title' => $categories[2],
//        'name' => 'Ботинки',
//        'path' => '/img/lot-4.jpg',
//        'price' => '109999'
//    ],
//    [
//        'id' => 4,
//        'title' => $categories[3],
//        'name' => 'Куртка для сноуборда',
//        'path' => '/img/lot-5.jpg',
//        'price' => '7500'
//    ],
//    [
//        'id' => 5,
//        'title' => $categories[4],
//        'name' => 'Маска Oakley',
//        'path' => '/img/lot-6.jpg',
//        'price' => '5400'
//    ],
//];

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

$mode = $_GET['mode'] ?? 'index';   // Если массив $_GET['mode'] существует, тогда $mode = $_GET['mode'], иначе $mode = 'index'

if ($mode === 'index') {            // Если $mode идентична 'index', тогда содержимое присваиваем $content функцию для подключения шаблона index.php
    $content = renderTamplate('templates/index.php', [
        'catalog' => $catalog,
        'categories' => $categories
    ]);

} elseif ($mode === 'lot') {                // Если $mode идентична 'lot'
    $lot = null;                            // Тогда записываем в переменную $lot значение null

    if (isset($_GET['lot_id'])) {           // если $_GET['lot_id'] существует
        $lot_id = $_GET['lot_id'];          // тогда присваиваем переменной $lot_id = $_GET['lot_id']

        foreach ($catalog as $item) {       // проходимся по массиву каталог
            if ($item['id'] == $lot_id) {    // если $item['id'] равно содержимому переменной $lot_id
                $lot = $item;               // тогда зприсваиваем переменной $lot содержимое переменной $item
                break;
            }
        }
    }
    if (!$lot) {                            // Если нет переменной $lot
        http_response_code(404);            // Показать код ошибки 404 (Такой страницы не существует)
    }

    $content = renderTamplate('templates/lot.php', compact('lot', 'step', 'message'));
} elseif ($mode === 'add') {
    $lot = [];
    $empty_errors = [
//        'name' => [],
//        'category' => [],
//        'message' => [],
//        'price' => [],
//        'step' => [],
//        'date' => []
    ];
    $errors = $empty_errors;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        /*$data = $_POST;
        echo "<br>";
        var_dump($data);
        echo "<br>";*/

        $errors['lot-name'] = [
            'error' => 'Введите имя лота'
        ];

        /*foreach ($data as $key=>$value) {
            //проверить что поля зополнены
            //если нет - добавить в поле ошибки в errors
            $errors[] = [
                'field' => 'имя поля',
                'error' => "текст ошибки"
            ];
            //если ошибки есть - вернуть их
            if (count($errors)) {

            }
        }*/
    }


    $content = renderTamplate('templates/add-lot.php', compact('lot', 'step', 'message', 'errors'));
}


//var_dump($_GET);


echo renderTamplate('templates/layout.php',
    compact('title', 'content', 'catalog', 'is_auth', 'categories', 'user_avatar', 'user_name'));


?>
