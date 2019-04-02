<?php
//[
//    [
//        'email' => 'ignat.v@gmail.com',
//        'name' => 'Игнат',
//        'password' => '$2y$10$OqvsKHQwr0Wk6FMZDoHo1uHoXd4UdxJG/5UDtUiie00XaxMHrW8ka'
//    ],
//    [
//        'email' => 'kitty_93@li.ru',
//        'name' => 'Леночка',
//        'password' => '$2y$10$bWtSjUhwgggtxrnJ7rxmIe63ABubHQs0AS0hgnOo41IEdMHkYoSVa'
//    ],
//    [
//        'email' => 'warrior07@mail.ru',
//        'name' => 'Руслан',
//        'password' => '$2y$10$2OxpEH7narYpkOT1H5cApezuzh10tZEEQ2axgFOaKW.55LxIJBgWW'
//                      '$2y$10$NnJ7bgtvJwNiAck7SNEIFeYrfzl8PeQN/bBr/.zmzvsAOxdHX62Jy'
//    ]
//];

function searchUserByEmail($email, $users)              //Функция для проверки email. Первый аргумент содержит данный введенные пользователем, второй аргумент данные на сервере
{
    $result = null;
    foreach ($users as $user) {
        if ($user['email'] == $email) {                 // проходимся по массиву, если данные которые ввел пользователь соответствуют данным на сервере
            $result = $user;                            // записываем в переменную result данные введенные пользователем
            break;
        }
    }
    return $result;                                     //возвращаем содержимое переменной result
}


function login()                                        //функция для входа на сайт
{
    $user = include 'userdata.php';                     // подключаем массив с данными пользователя
    $errors = [];                                                   //  пустой массив для ошибок

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'POST' :
            $data = $_POST;                                                  // для удобства записываем данный из формы в переменную date
            $required = ['email', 'password'];                              // начинаем валидацию


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
                    $errors['password'] = 'Неверный пароль';    // В противном случае пароль не верный, и мы добавляем сообщение об этом в список ошибок
                }
            } else {
                $errors['email'] = 'Такой пользователь не найден';  // Если функция searchUserByEmail вернула false, значит в массиве $user пользователь с таким email не существует
            }

            if (count($errors)) {                                   // Если были ошибки, значит мы снова должны показать форму входа, передав в шабло список полученных ошибок.
                return renderTamplate('templates/login-page.php', compact('data', 'errors'));
            } else {                                                 // Если ошибок нет, значит аутификация прошла успешно и пользователя можно перенаправить на главную страницу
                redirect('index.php?mode=index');
            }
            break;
        case 'GET' :
            if (isset($_SESSION['user'])) {
                redirect('index.php?mode=index');
            }
            break;
    }
    return renderTamplate('templates/login-page.php', compact('errors', 'user', 'data', 'required', 'field'));

}