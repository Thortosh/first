<?php

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
    $errors = [];
    $data = [];

    if (!isset($_SESSION['user'])) {
        redirect('index.php');
    }

    //    Подключаем бд, таблицу со списком категорий
    $con = mysqli_connect("localhost", "root", "", "yeti");                         // Устанавливает новое соединение с сервером MySQL
    //    Получаем сведения о категории
    $sql = "SELECT id, name FROM categories";                                       // Тело запроса
    $result = mysqli_query($con, $sql);                                             // Выполняет запрос к базе данных. Объект результата
    $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);                          // Преобразуем объект результата в двумерный массив с записями

    $rules = get_validation_rules();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {                                    // Если метод для запроса страницы POST
        $data = $_POST;                                                             // Переменная date содержит переданный ассоциативный массив данных
        foreach ($data as $key => $value) {
            if (empty($value) && isset($rules[$key])) {                             // Empty возвращает true если переменная пустая
                $errors[$key] = $rules[$key];                                       // записываем в массив errors содержимое массива $empty_field_error_texts.
            }
        }

//     Определяем id категории который указал пользователь для своего лота и записываем id в $category_id.
        foreach ($categories as $key => $value) {
            if ($value['name'] == $data['category']) {
                $category_id = $value['id'];                                            // id категории в таблице lots
            }
        }
//    Подключаем бд, таблицу со списком пользователей
        $sqluser = "SELECT id, email FROM userdata";
        $result = mysqli_query($con, $sqluser);
        $userdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
//     Определяем какой пользователь авторизован. Нужно указать кому принадлежит данное объявление
        foreach ($userdata as $key => $value) {
            if ($value['email'] == $_SESSION['user']['email']) {
                $userdata = $value['id'];                                               // id пользователя в таблице lots
            }
        }

        $lot_name = $data['lot-name'];                                                 // наименование лота
        $message = $data['message'];                                                   // описание
        $lot_rate = $data['lot-rate'];                                                 // стартовая цена
        $lot_step = $data['lot-step'];                                                 // шаг ставки
        $lot_date = $data['lot-date'];                                                 // дата окончания лота


        //      Добовляем информация о лота в бд.
        $sqlins = "INSERT INTO lots SET 
        categories_id = '$category_id',
        userdata_id = '$userdata', 
        name = '$lot_name', 
        description = '$message', 
        path = NULL, 
        startprice = '$lot_rate', 
        lot_step = '$lot_step',
        closing_date = '$lot_date'";

        $result = mysqli_query($con, $sqlins);

    }
    return renderTamplate('templates/add-lot.php', compact('errors', 'data', 'categories', 'lot_name', 'message', 'lot_rate'));
}

