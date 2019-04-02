<?php

function logoff()
{
    session_destroy();
    redirect('index.php?mode=index');
}
