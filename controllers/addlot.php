<?php
/**
 * $lot
 * $empty_errors
 * $errors
 *
 *
 */

function is_date($date_string)                      // Функция для проверки даты
{
    $date_array = explode('-', $date_string);       // explode - рзбивает строку с помощью разделителя '-'

    if (count($date_array) !== 3) {                 // count — Подсчитывает количество элементов массива или что-то в объекте. false если не равно 3.
        return false;
    } else {
        $year = $date_array[0];                     // иначе создаем переменные для записи элементов массива
        $month = $date_array[1];
        $day = $date_array[2];

        return checkdate($month, $day, $year);      // checkdate - проверяет корректность даты по григорианскому календарю. Е
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
    $errors = [];                                                                   // пустой массив с ошибками
    $data = [];                                                                     // пустой массив с ошибками

    $required_validation_rules = get_lot_form_required_validation_rules();          // определяем функцию которая возвращает массив с ошибками
    $numeric_validation_rules = get_lot_form_numeric_validation_rules();
    $get_lot_form_date_validation_rules = get_lot_form_date_validation_rules();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                                    // Если метод для запроса страницы POST
        $data = $_POST;                                                             // Переменная date содержит переданный ассоциативный массив данных
        foreach ($data as $key => $value) {
            if (empty($value) && isset($required_validation_rules[$key])) {         // Empty возвращает true если переменная пустая
                $errors[$key] = $required_validation_rules[$key];                   // записываем в массив errors содержимое массива $empty_field_error_texts.
            }
            if (!is_numeric($value) && isset($numeric_validation_rules[$key])) {
                $errors[$key] = $numeric_validation_rules[$key];
            }
            if (!is_date($value) && isset($get_lot_form_date_validation_rules[$key])) {
                $errors[$key] = $get_lot_form_date_validation_rules[$key];
            }
        }

    }
    return renderTamplate('templates/add-lot.php', compact('errors', 'data'));
}

