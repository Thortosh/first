<? //var_dump($lot_step); ?>
<section class="lot-item container">
    <h2><?= $lot['name']; ?></h2>
    <div class="lot-item__content">
        <div class="lot-item__left">
            <div class="lot-item__image">
                <img src="<?= $lot['path']; ?>" width="730" height="548" alt="Сноуборд">
            </div>
            <p class="lot-item__category">Категория: <span><?= $lot['category_name']; ?></span></p>
            <p class="lot-item__description"><?= $lot['description']; ?></p>
        </div>
        <div class="lot-item__right">
            <div class="lot-item__state">,
                <div class="lot-item__timer timer">
                    10:54:12
                </div>
                <div class="lot-item__cost-state">
                    <div class="lot-item__rate">
                        <span class="lot-item__amount">Текущая цена</span>
                        <span class="lot-item__cost"><?= $price ?? $lot['startprice'] ?></span>
                    </div>
                    <div class="lot-item__min-cost">
                        Мин. ставка <span><?= empty($price) ? $lot['startprice']+$lot_step : $price + $lot_step; ?></span>
                    </div>
                </div>
                <form class="lot-item__form" action="" method="post">
                    <p class="lot-item__form-item">
                        <label for="cost">Ваша ставка</label>
                        <input id="cost" type="number" name="cost"
                               placeholder="<?= empty($price) ? $lot['startprice']+$lot_step : $price + $lot_step; ?>"
                               value="<?= $data ?? ''; ?>">
                    </p>
                    <button type="submit" class="button">Сделать ставку</button>
                </form>
            </div>
            <div class="history">
                <? foreach ($bets

                as $key => $value) : ?>
                <? if ($value['lots_id'] == $lot_id) : ?>
                <!--                <h3>История ставок (<span>--><? //= count($value['lots_id']) ?><!--</span>)</h3>-->
                <table class="history__list">
                    <tr class="history__item">
                        <td class="history__name"><?= $value['name']; ?></td>
                        <td class="history__price"><?= $value['price']; ?></td>
                        <td class="history__time"><?= $value['time']; ?></td>
                    </tr>
                    <? endif; ?>
                    <? endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</section>