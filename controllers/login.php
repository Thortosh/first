<?php

function searchUserByEmail($email, $users)              //Функция для проверки email. Первый аргумент содержит данный введенные пользователем, второй аргумент данные на сервере
{
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {                // Проходимся по массиву, если данные которые ввел пользователь соответствуют данным на сервере
            $result = $user;                           // Записываем в переменную result данные введенные пользователем
            break;
        }
    }
    return $result;                                    // Возвращаем содержимое переменной result
}

function login()                                       // Функция для входа на сайт
{
    $errors = [];                                      // Пустой массив для ошибок

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST' :
            $data = $_POST;                                                  // для удобства записываем данный из формы в переменную data
            $required = ['email', 'password'];                              // начинаем валидацию

            $con = mysqli_connect("localhost", "root", "", "yeti");                   // Устанавливает новое соединение с сервером MySQL
            $sql = "SELECT email, name, password FROM userdata";                    // Тело запроса
            $result = mysqli_query($con, $sql);                                     // Выполняет запрос к базе данных. Объект результата
            $user = mysqli_fetch_all($result, MYSQLI_ASSOC);                        // Преобразуем объект результата в двумерный массив с записями


            foreach ($required as $field)                                   // Проверяем все поля на заполненность . Проходим массив всех необъодимых полей
            {
                if (empty($data[$field])) {                                 // пример : если массив $_POST['email'] пустой
                    $errors[$field] = 'Это поле надо заполнить!';           //записываем в массив ошибов
                }
            }
            if (!count($errors) && $user = searchUserByEmail($data['email'], $user)) {
                /*Если нет ошибок и что user смогли найти  по переданному email
                 * Далее проверяем чтосохранненый хэш пароля и введеный пароль из формы совпадают.
                 * Если совпадение есть, знают пользователь указал верный пароль
                 * Тогда мы можем открыть для него сессию и записать в неё все данные о пользователе
                 * */
                if (password_verify($data['password'], $user['password'])) {
                    $_SESSION['user'] = $user;
                } else {
                    $errors['password'] = 'Неверный пароль';                // В противном случае пароль не верный, и мы добавляем сообщение об этом в список ошибок
                }
            } else {
                $errors['email'] = 'Такой пользователь не найден';          // Если функция searchUserByEmail вернула false, значит в массиве $user пользователь с таким email не существует
            }

            if (count($errors)) {                                           // Если были ошибки, значит мы снова должны показать форму входа, передав в шабло список полученных ошибок.
                return renderTamplate('templates/login-page.php', compact('data', 'errors'));
            } else {                                                        // Если ошибок нет, значит аутификация прошла успешно и пользователя можно перенаправить на главную страницу
                redirect('index.php?mode=index');
            }
            break;
        case 'GET' :                                                        // Если метод запроса GET
            if (isset($_SESSION['user'])) {                                 // Проверяем существование сессии. Если существует, передаем в заголовках главную страницу
                redirect('index.php?mode=index');
            }
            break;
    }
    return renderTamplate('templates/login-page.php', compact('errors', 'user', 'data', 'required', 'field'));

}