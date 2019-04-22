<?php

ini_set('display_error', 1);
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Europe/Moscow");
session_start();                                    // Объявляем начало сессии

require_once('functions.php');                      // Подключаем файл с функциями
require_once('controllers/pages.php');              // Подключаем маршрутизатор

$title = 'Yeti';
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное',];

$mode = $_GET['mode'] ?? 'index';   // Если массив $_GET['mode'] существует, тогда $mode = $_GET['mode'], иначе $mode = 'index'
$content = pages($mode);          //определяем переменную content

$user = $_SESSION['user'] ?? [];

echo renderTamplate('templates/layout.php',
    compact('title', 'content', 'catalog', 'is_auth', 'categories', 'user'));
?>
