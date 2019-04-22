<?php

function ThisEmailAlreadyExists($email, $users)              //Функция для проверки email. Первый аргумент содержит данный введенные пользователем, второй аргумент данные на сервере
{
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {                 // проходимся по массиву, если данные которые ввел пользователь соответствуют данным на сервере
            echo 'Такой email уже существует';          // записываем в переменную result данные введенные пользователем
            break;
        }
    }
    return $result;                                     //возвращаем содержимое переменной result
}

function signup()
{
    $con = mysqli_connect("localhost", "root", "", "yeti");                 // Устанавливает новое соединение с сервером MySQL
    $errors = [];                                                           // создаем пустой массив с ошибками
    switch ($_SERVER['REQUEST_METHOD']) {                                   // Проверяем каким методом отправлены данные
        case 'POST' :                                                       // Если это POST
            $data = $_POST;                                                 // Записываем массив POST в переменную data для удобства
            $required = ['email', 'password', 'name', 'contact'];                              // создаем массив с ошибками

            foreach ($required as $field)                                   // Проверяем все поля на заполненность . Проходим массив всех необъодимых полей
            {
                if (empty($data[$field])) {                                 // пример : если массив $_POST['email'] пустой
                    $errors[$field] = 'Это поле надо заполнить!';           // записываем в массив ошибок
                }
            }

            if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {        // Фильруем переменную с помощью фильтра FILTER_VALIDATE_EMAIL
                $email = $data['email'];                                    // Результат записываем в переменную $email
                //echo "Адрес указан корректно.";
            } else {
                $errors['email'] = 'Адрес указан не правильно.';
            }

            if (empty($errors)) {                                           // Если переменная с ошибками пустая
                $name = $data['name'];                                              // Записываем в переменную $name имя пользователя
                $password = password_hash($data['password'], PASSWORD_DEFAULT);     // хэшуруем пароль пользователя и записываем в переменную $password
                $sql = "INSERT INTO userdata SET email = '$email', password = '$password', name = '$name'";         // Тело запроса
                $result = mysqli_query($con, $sql);                                                                 // Выполняет запрос к базе данных. Объект результата
//                if ($result == true) {                                              // Проверяем отработала ли 48 строка.
//                    $last_id = mysqli_insert_id($con);                              // Возвращает идентификатор последней добавленной записи
//                    echo $last_id . "Информация занесена в базу данных <br/>";
//                } else {
//                    echo "Информация не занесена в базу данных <br/>";
//                }
            }

            break;
        case 'GET' :
            if (isset($_SESSION['user'])) {
                redirect('index.php?mode=index');
            }
            break;
    }

    return renderTamplate('templates/signup.php', compact('errors', 'data', 'required', 'field'));
}