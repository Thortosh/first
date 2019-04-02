<?php
/**
 * @var array $catalog
 * @return string
 */
function search()
{
    $searchPhrase = $_POST['search'];
    $catalog = []; //подключить каталог
    //проитись по каталогу и найти по имени и категории

    $result = [];
    /**
     * $result = mysql -> select * from catalog where title like %search% or name like %search%
     */
    foreach ($catalog as $var) {
        if (
            strpos($searchPhrase, $var['title']) !== false
            ||
            strpos($searchPhrase, $var['name']) !== false
        ) {
            $result[] = $var;
        }
    }
    return renderTamplate('templates/search.php', [
        'result' => $result
    ]);
}
