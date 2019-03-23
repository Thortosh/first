<?php

function layout(){
    echo renderTamplate('templates/layout.php',
        compact('title', 'content', 'catalog', 'is_auth', 'categories', 'user_avatar', 'user_name'));
}
