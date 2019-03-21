<?php
/**
 * $lot
 * $empty_errors
 * $errors
 *
 *
 */

function is_date($date_string)
{
    $date_array = explode('-', $date_string);

    if (count($date_array) !== 3) {
        return false;
    } else {
        $year = $date_array[0];
        $month = $date_array[1];
        $day = $date_array[2];

        return checkdate($month, $day, $year);
    }
}

function get_lot_form_required_validation_rules()       // Возвращает тексты ошибок для пустых полей.
{
    return [
        'lot-name' => 'Введите имя лота',
        'category' => 'Выберите категорию',
        'message' => 'Введите описание лота',
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введи шаг ставки',
        'lot-date' => 'Введите дату окончания лота'
    ];
//    $errors['message'] = [
//        'error' => 'Введите описание лота'
//    ];
//    $errors['lot-rate'] = [
//        'error' => 'Введите начальную цену'
//    ];
//    $errors['lot-step'] = [
//        'error' => 'Введите шаг ставки'
//    ];
//    $errors['lot-date'] = [
//        'error' => 'Введите дату окончания лота'
//    ];
}

function get_lot_form_numeric_validation_rules()
{
    return [
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введите шаг ставки'
    ];
}

function get_lot_form_date_validation_rules()
{
    return [
        'lot-date' => 'Введите дату'
    ];
}

function addlot()
{
    $errors = [];                                                       // пустой массив с ошибками
    $data = [];                                                       // пустой массив с ошибками

    $required_validation_rules = get_lot_form_required_validation_rules();        // определяем функцию которая возвращает массив с ошибками
    $numeric_validation_rules = get_lot_form_numeric_validation_rules();
    $get_lot_form_date_validation_rules = get_lot_form_date_validation_rules();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                        // Если метод для запроса страницы POST
        $data = $_POST;                                                 // Переменная date содержит переданный ассоциативный массив данных
        foreach ($data as $key => $value) {                             //
            if (isset($required_validation_rules[$key]) && empty($value)) {                                        // Empty возвращает true если переменная пустая
                $errors[$key] = $required_validation_rules[$key];     // записываем в массив errors содержимое массива $empty_field_error_texts. пример
            }

            if (isset($numeric_validation_rules[$key]) && !is_numeric($value)) {
                $errors[$key] = $numeric_validation_rules[$key];
            }
            if (isset($get_lot_form_date_validation_rules[$key]) && !is_date($value)) {
                $errors[$key] = $get_lot_form_date_validation_rules[$key];
            }
        }

    }
    return renderTamplate('templates/add-lot.php', compact('errors', 'data'));
}

//    $lot = [];
//    $empty_errors = [
//        'name' => [],
//        'category' => [],
//        'message' => [],
//        'price' => [],
//        'step' => [],
//        'date' => []
//    ];
//    $errors = $empty_errors;
//
//    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//        $lot = $_POST;
//        if (empty($lot['name'])) {
//            $errors['name'][] = 'Введите наименование лота';
//        }
//        if (empty($lot['category'])) {
//            $errors['category'][] = 'Выберите категорию';
//        }
//        if (empty($lot['message'])) {
//            $errors['message'][] = 'Введите email';
//        }
//        if (empty($lot['price'])) {
//            $errors['price'][] = 'Введите начальную цену лота';
//        } else {
//            if (!is_numeric($lot['price'])) {
//                $errors['price'][] = 'Это должно быть число';
//            } else {
//                if ($lot['price'] <= 0) {
//                    $errors['price'][] = 'Это должно быть положительное число';
//                }
//            }
//        }
//        if (empty($lot['step'])) {
//            $errors['step'][] = 'Введите шаг ставки';
//        } else {
//            if (!is_numeric($lot['step'])) {
//                $errors['step'][] = 'Введите шаг ставки';
//            }
//        }
//        if (empty($lot['date'])) {
//            $errors['date'][] = 'Введите дату окончания лота';
//        }
//        if ($errors === $empty_errors) {
//            return renderTemplate('templates/lot.php', compact('lot' , 'step'));
//        } else {
//            return renderTemplate('templates/add-lot.php', compact('lot', 'errors'));
//        }
//    } else {
//        return renderTemplate('templates/add-lot.php', compact('lot', 'errors'));
//    }
//}
