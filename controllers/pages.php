<?php
function  pages($mode)
{
    switch ($mode) {
        case 'index':
            include 'homepage.php';
            return homepage();
            break;
        case 'lot':
            include 'viewlot.php';
            return viewlot();
            break;
        case 'add':
            include 'addlot.php';
            return addlot();
            break;
        case 'history':
            include 'history.php';
            return history();
            break;
        case 'login':
            include 'login.php';
            return login();
            break;
        case 'logoff':
            include 'logoff.php';
            return logoff();
            break;
        case 'signup':
            include 'signup.php';
            return signup();
            break;
        case 'search':
            include 'search.php';
            return search();
            break;
    }
}