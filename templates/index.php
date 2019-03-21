<!--
$categories
$catalog
-->

<section class="promo">
    <h2 class="promo__title">Нужен стафф для катки?</h2>
    <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное
        снаряжение.</p>
    <ul class="promo__list">

        <? foreach ($categories as $key => $val): ?>
            <li class="promo__item promo__item--boards">
                <a class="promo__link" href="all-lots.html"><?= $val; ?></a>
            </li>
        <? endforeach; ?>

    </ul>
</section>
<section class="lots">
    <div class="lots__header">
        <h2>Открытые лоты</h2>
    </div>


    <ul class="lots__list">
        <? foreach ($catalog as $key => $val): ?>
            <li class="lots__item lot">
                <div class="lot__image">
                    <img src="<?= $val['path']; ?>" width="350" height="260"
                         alt="<?= htmlspecialchars($val['title']); ?>">
                </div>
                <div class="lot__info">
                    <span class="lot__category"><?= htmlspecialchars($val['title']); ?></span>
                    <h3 class="lot__title"><a class="text-link"
                                              href="index.php?mode=lot&lot_id=<?= $val['id']; ?>"><?= htmlspecialchars($val['name']); ?></a>
                    </h3>
                    <div class="lot__state">
                        <div class="lot__rate">
                            <span class="lot__amount">Стартовая цена</span>
                            <span class="lot__cost"><?= price_ceil($val['price']); ?><b class="rub">р</b></span>
                        </div>
                        <div class="lot__timer timer">
                            <? date_default_timezone_set("Europe/Moscow");
                            $ts = time();

                            $ts_midnight = strtotime('tomorrow');
                            $second_to_midnight = $ts_midnight - $ts;

                            $hours = floor($second_to_midnight / 3600);
                            $minutes = floor(($second_to_midnight % 3600) / 60);

                            echo("$hours чсов $minutes минут");
                            //$curtime = date('H:i:s');
                            //print("Текущее время: $curtime<br>")
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        <? endforeach; ?>
    </ul>

</section>
