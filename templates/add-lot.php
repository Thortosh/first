<?php
/** @var $errors array
 *name field
 *  lot-name - имя поля
 *  category - выберете категори.
 *  message - описание лота
 *  lot-rate - начальная цена
 *  lot-step - шаг ставки
 *  lot-date - дата завершения торгов
 *
 */
?>
<form name="" class="form form--add-lot container form--invalid" action="index.php?mode=add" method="POST">
    <!-- form--invalid -->
    <h2>Добавление лота</h2>
    <div class="form__container-two">
        <div class="form__item <?= key_exists('lot-name', $errors) ? 'form__item--invalid' : '' ?> ">
            <!-- form__item--invalid -->
            <label for="lot-name">Наименование</label>
            <input id="lot-name" type="text" name="lot-name" placeholder="Введите наименование лота"
                   value="<?= $data['lot-name'] ?? '' ?>">
            <? if (key_exists('lot-name', $errors)): ?>
                <label class="form__error"><?= $errors['lot-name'] ?></label>
            <? endif; ?>
        </div>
        <div class="form__item <?= key_exists('category', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="category">Категория</label>
            <select id="category" name="category">
                <option></option>
                <option>Доски и лыжи</option>
                <option>Крепления</option>
                <option>Ботинки</option>
                <option>Одежда</option>
                <option>Инструменты</option>
                <option>Разное</option>
            </select>
            <? if (key_exists('category', $errors)): ?>
                <span class="form__error"><?= $errors['category'] ?></span>
            <? endif; ?>
        </div>
    </div>
    <div class="form__item <?= key_exists('message', $errors) ? 'form__item--invalid' : '' ?>">
        <label for="message">Описание</label>
        <textarea id="message" name="message"
                  placeholder="Напишите описание лота"><?= $data['message'] ?? '' ?></textarea>
        <? if (key_exists('message', $errors)): ?>
            <span class="form__error"><?= $errors['message'] ?></span>
        <? endif; ?>
    </div>
    <div class="form__item form__item--file"> <!-- form__item--uploaded -->
        <label>Изображение</label>
        <div class="preview">
            <button class="preview__remove" type="button">x</button>
            <div class="preview__img">
                <img src="img/avatar.jpg" width="113" height="113" alt="Изображение лота">
            </div>
        </div>
        <div class="form__input-file">
            <input class="visually-hidden" type="file" id="photo2" value="">
            <label for="photo2">
                <span>+ Добавить</span>
            </label>
        </div>
    </div>
    <div class="form__container-three">
        <div class="form__item form__item--small <?= key_exists('lot-rate', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="lot-rate">Начальная цена</label>
            <input id="lot-rate" type="text" value="<?= $data['lot-rate'] ?? '' ?>" name="lot-rate" placeholder="0">
            <? if (key_exists('lot-rate', $errors)): ?>
                <span class="form__error"><?= $errors['lot-rate'] ?></span>
            <? endif; ?>
        </div>
        <div class="form__item form__item form__item--small <?= key_exists('lot-step', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="lot-step">Шаг ставки</label>
            <input id="lot-step" type="number" value="<?= $data['lot-step'] ?? '' ?>" name="lot-step" placeholder="0">
            <? if (key_exists('lot-step', $errors)): ?>
                <span class="form__error"><?= $errors['lot-step'] ?></span>
            <? endif; ?>
        </div>
        <div class="form__item  <?= key_exists('lot-date', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="lot-date">Дата окончания торгов</label>
            <input class="form__input-date" id="lot-date" value="<?= $data['lot-date'] ?? '' ?>" type="date"
                   name="lot-date">
            <? if (key_exists('lot-date', $errors)): ?>
                <span class="form__error"><?= $errors['lot-date'] ?></span>
            <? endif; ?>
        </div>
    </div>
    <?php if (count($errors) > 0): ?>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
    <?php endif; ?>
    <button type="submit" class="button">Добавить лот</button>
</form>
