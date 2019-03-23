<?php
function viewlot()
{
    $bets = include 'bets.php';
    $catalog = include 'arr.php';
    $lot = null;                            // Тогда записываем в переменную $lot значение null

    if (!isset($_GET['lot_id'])) {
        http_response_code(404);
        return 'not found';
    }

    $lot_id = $_GET['lot_id'];          // тогда присваиваем переменной $lot_id = $_GET['lot_id']

    foreach ($catalog as $item) {       // проходимся по массиву каталог
        if ($item['id'] == $lot_id) {   // если $item['id'] равно содержимому переменной $lot_id
            $lot = $item;               // тогда зприсваиваем переменной $lot содержимое переменной $item
            break;
        }
    }
//    }
    if (is_null($lot)) {                    // Если переменная $lot == null
        http_response_code(404);            // Показать код ошибки 404 (Такой страницы не существует)
        return 'not found';
    }

    return renderTamplate('templates/lot.php', compact('lot', 'bets'));
}
