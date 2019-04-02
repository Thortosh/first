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

function get_validation_rules()       // Возвращает тексты ошибок для пустых полей.
{
    return [
        'lot-name' => 'Введите имя лота',
        'category' => 'Выберите категорию',
        'message' => 'Введите описание лота',
        'lot-rate' => 'Введите начальную цену',
        'lot-step' => 'Введи шаг ставки',
        'lot-date' => 'Введите дату окончания лота',
    ];
}

function addlot()
{
    $errors = [];                                                                   // пустой массив с ошибками
    $data = [];                                                                     // пустой массив с ошибками

    //если пользователь не пользователь - 403 иди на хуй
    if (!isset($_SESSION['user'])){
        redirect('index.php');
    }

    $rules = get_validation_rules();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                                    // Если метод для запроса страницы POST
        $data = $_POST;                                                             // Переменная date содержит переданный ассоциативный массив данных
        foreach ($data as $key => $value) {
            if (empty($value) && isset($rules[$key])) {         // Empty возвращает true если переменная пустая
                $errors[$key] = $rules[$key];                   // записываем в массив errors содержимое массива $empty_field_error_texts.
            }
        }
    }
    return renderTamplate('templates/add-lot.php', compact('errors', 'data'));
}

