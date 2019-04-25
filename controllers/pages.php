<?php
function pages($mode)
{
    switch ($mode) {
        case 'index':                           // главная страница
            include 'homepage.php';
            return homepage();
            break;
        case 'lot':                             // страница отображения лота
            include 'viewlot.php';
            return viewlot();
            break;
        case 'add':                             // добавление лота
            include 'addlot.php';
            return addlot();
            break;
        case 'history':                         // история просмотра
            include 'history.php';
            return history();
            break;
        case 'login':                           // авторизация
            include 'login.php';
            return login();
            break;
        case 'logoff':                          // выход
            include 'logoff.php';
            return logoff();
            break;
        case 'signup':                          // регисрация
            include 'signup.php';
            return signup();
            break;
        case 'search':                          // поиск
            include 'search.php';
            return search();
            break;
        case 'mylots':                          // мои лоты
            include 'mylots.php';
            return mylots();
            break;
    }
}