<main>
    <div class="container">
        <section class="lots">
            <h2> История просмотров</h2>
            <ul class="lots__list">
                <? if (isset($_COOKIE['visitcount'])) : //если $_COOKIE['visitcount'] массив существует
                    $cookie = $_COOKIE['visitcount'];   // записываем его в переменную cookie
                    $explodecookie = explode(",", $cookie); // разбиваем строку на массив
                    foreach ($catalog as $var) :            // проходимся по массиву
                        $key = array_search($var['id'], $explodecookie);
                        //array_search — Осуществляет поиск данного значения $var['id'] в массиве  $explodecookie и возвращает ключ первого найденного элемента в случае удачи
                        if ($key !== false) :?> <!---- если переменная key не равна false тогда подставляем данный из массива catalog-->
                            <li class="lots__item lot">
                                <div class="lot__image">
                                    <img src="<?= $var['path']; ?>" width="350" height="260"
                                         alt="Сноуборд">
                                </div>
                                <div class="lot__info">
                                    <span class="lot__category"><?= $var['category_name']; ?></span>
                                    <h3 class="lot__title">
                                        <a class="text-link" href="index.php?mode=lot&lot_id=<?= $var['id']; ?>">
                                            <?= $var['name'] ?>
                                        </a>
                                    </h3>
                                    <div class="lot__state">
                                        <div class="lot__rate">
                                            <span class="lot__amount">Стартовая цена</span>
                                            <span class="lot__cost">
                                                    <?= price_ceil($var['startprice']); ?>
                                                    <b class="rub">р</b>
                                                </span>
                                        </div>
                                        <div class="lot__timer timer">
                                            16:54:12
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <? endif; ?>
                    <? endforeach; ?>
                <? endif; ?>
            </ul>
        </section>
        <ul class="pagination-list">
            <li class="pagination-item pagination-item-prev"><a>Назад</a></li>
            <li class="pagination-item pagination-item-active"><a>1</a></li>
            <li class="pagination-item"><a href="#">2</a></li>
            <li class="pagination-item"><a href="#">3</a></li>
            <li class="pagination-item"><a href="#">4</a></li>
            <li class="pagination-item pagination-item-next"><a href="#">Вперед</a></li>
        </ul>
    </div>
</main>
