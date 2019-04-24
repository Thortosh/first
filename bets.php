<?php

$con = mysqli_connect("localhost", "root", "", "yeti");                         // Устанавливает новое соединение с сервером MySQL
//    Получаем сведения о категории
$sql = "SELECT l.id,
startprice,
b.userdata_id,
lots_id,
price,
u.name as name,
time,
l.lot_step 
FROM bets b 
 JOIN userdata u ON u.id = b.userdata_id
 right JOIN lots l ON l.id = b.lots_id;";                                                    // Тело запроса
$result = mysqli_query($con, $sql);                                             // Выполняет запрос к базе данных. Объект результата
$bets = mysqli_fetch_all($result, MYSQLI_ASSOC);



