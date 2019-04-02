<?php


function viewlot()
{


    $bets = include 'bets.php';
    $catalog = include 'arr.php';
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

    $visitcount = array_key_exists('visitcount', $_COOKIE) ? explode(',', $_COOKIE['visitcount']) : [];
    // если в массиве COOKIE присутствует указанный ключ visitcoun, тогда записываем в переменную $visitcount массив, иначе записываем пустой массив
    //            var_dump($visitcount);

    $counter_name = "visitcount";               // имя куки
    $expire = strtotime("+30 days");            // срок жизни куки
    $path = "/";                                // доступ на всем сайте


    if (!in_array($lot_id, $visitcount)) {      // если в массиве $visitcount НЕ присутствует значение $lot_id
        $visitcount[] = $lot_id;                // записываем последним элементом этот массив
    }
    //аналогично:
    //array_push($_COOKIE['visitcount'], $lot_id);

    setcookie($counter_name, implode(',', $visitcount), $expire, $path);
    if (is_null($lot)) {                    // Если переменная $lot == null
        http_response_code(404);            // Показать код ошибки 404 (Такой страницы не существует)
        return 'not found';
    }
    return renderTamplate('templates/lot.php', compact('lot', 'bets'));
}
