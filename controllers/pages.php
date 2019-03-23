<?php
function pages($mode)
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
        case 'all':
            include 'alllots.php';
            return alllots();
            break;
        case 'login':
            include 'registration.php';
            return login();
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