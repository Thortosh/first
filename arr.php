<?php

$con = mysqli_connect("localhost", "root", "", "yeti");
$sqllot = "SELECT l.id as id, c.name as category_name, categories_id, l.name, path, startprice, description 
FROM lots l LEFT JOIN categories c ON l.categories_id = c.id";               // Тело запроса
$res = mysqli_query($con, $sqllot);                                     // Выполняет запрос к базе данных. Объект результата
$catalog = mysqli_fetch_all($res, MYSQLI_ASSOC);                        // Преобразуем объект результата в двумерный массив с записями

//var_dump($catalog);