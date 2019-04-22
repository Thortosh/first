<main>
    <form class="form container" action="" method="post"> <!-- form--invalid -->
        <h2>Регистрация нового аккаунта</h2>
        <div class="form__item <?= key_exists('email', $errors) ? 'form__item--invalid' : '' ?>">

            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail"
                   value="<?= $data['email'] ?? '' ?>">
            <? if (key_exists('email', $errors)) : ?>
                <span class="form__error"><?= $errors['email'] ?></span>
            <? endif; ?>
        </div>
        <div class="form__item <?= key_exists('password', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль"
                   value="<?= $data['password'] ?? '' ?>">
            <? if (key_exists('password', $errors)) : ?>
                <span class="form__error">Введите пароль</span>
            <? endif; ?>
        </div>
        <div class="form__item <?= key_exists('name', $errors) ? 'from__item--invalid' : '' ?> ">
            <label for="name">Имя*</label>
            <input id="name" type="text" name="name" placeholder="Введите имя"
                   value="<?= $data['name'] ?? '' ?>">
            <? if (key_exists('name', $errors)) : ?>
                <span class="form__error">Введите имя</span>
            <? endif; ?>
        </div>
        <div class="form__item <?= key_exists('contact', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="message">Контактные данные*</label>
            <textarea id="contact" name="contact"
                      placeholder="Напишите как с вами связаться"><?= $data['contact'] ?? '' ?> </textarea>
            <? if (key_exists('contact', $errors)) : ?>
                <span class="form__error">Напишите как с вами связаться</span>
            <? endif; ?>
        </div>
        <div class="form__item form__item--file form__item--last">
            <label>Аватар</label>
            <div class="preview">
                <button class="preview__remove" type="button">x</button>
                <div class="preview__img">
                    <img src="img/avatar.jpg" width="113" height="113" alt="Ваш аватар">
                </div>
            </div>
            <div class="form__input-file">
                <input class="visually-hidden" type="file" id="photo2" value="">
                <label for="photo2">
                    <span>+ Добавить</span>
                </label>
            </div>
        </div>
        <span class="form__error form__error--bottom">Пожалуйста, исправьте ошибки в форме.</span>
        <button type="submit" class="button">Зарегистрироваться</button>
        <a class="text-link" href="#">Уже есть аккаунт</a>
    </form>
</main>