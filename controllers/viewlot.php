<?php

function viewlot()
{
    include 'bets.php';
    include 'arr.php';                      // подключаем бд
    $lot = null;                            //  записываем в переменную $lot значение null
    if (!isset($_GET['lot_id'])) {          // Если глобальная переменная не определена, тогда ошибка
        http_response_code(404);
        return 'not found';
    }
    $lot_id = $_GET['lot_id'];          //  присваиваем переменной $lot_id = $_GET['lot_id']
    foreach ($catalog as $item) {            // проходимся по массиву каталог
        if ($item['id'] == $lot_id) {       // если $item['id'] равно содержимому переменной $lot_id
            $lot = $item;                   // тогда зприсваиваем переменной $lot содержимое переменной $item
            break;
        }
    }

    foreach ($bets as $key => $value) {     // Проходимся по полученным данным из бд
        if ($value['id'] == $lot_id) {      // определяем lot_id
            $price = $value['price'];       // запи
            $lot_step = $value['lot_step'];
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                                    // Если метод для запроса страницы POST
        $data = $_POST;
        foreach ($data as $key => $value) {
            $one = isset($price) ? $price + $lot_step : $lot['startprice'] + $lot_step;
            $cost = $value;
            echo $price;
            if ($cost >= $one) {

                $user_id = ($_SESSION['user']['id']);

                $sql = "INSERT INTO bets SET
                userdata_id = '$user_id',
                lots_id = '$lot_id',
                price = '$cost'";
                $result = mysqli_query($con, $sql);
                echo 'da';
            }
        }
    }


    if (isset($_SESSION['user'])) {
        $visitcount = array_key_exists('visitcount', $_COOKIE) ? explode(',', $_COOKIE['visitcount']) : [];
        // если в массиве COOKIE присутствует указанный ключ visitcoun, тогда записываем в переменную $visitcount массив, иначе записываем пустой массив
        //            var_dump($visitcount);
        $counter_name = "visitcount";               // имя куки
        $expire = strtotime("+30 days");            // срок жизни куки
        $path = "/";                                // доступ на всем сайте
        if (!in_array($lot_id, $visitcount)) {      // если в массиве $visitcount НЕ присутствует значение $lot_id
            $visitcount[] = $lot_id;                // записываем последним элементом этот массив
        }
        setcookie($counter_name, implode(',', $visitcount), $expire, $path);
        if (is_null($lot)) {                    // Если переменная $lot == null
            http_response_code(404);            // Показать код ошибки 404 (Такой страницы не существует)
            return 'not found';
        }
    }
    return renderTamplate('templates/lot.php', compact('lot', 'bets', 'lot_id', 'price', 'lot_step'));
}
