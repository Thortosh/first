<main>
    <form class="form container" action="" method="post">
        <h2>Вход</h2>
        <div class="form__item <?= key_exists('email', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="email">E-mail*</label>
            <input id="email" type="text" name="email" placeholder="Введите e-mail"
                   value="<?= $data['email'] ?? '' ?>">
            <? if (key_exists('email', $errors)) : ?>
                <span class="form__error"><?= $errors['email']; ?></span>
            <? endif; ?>
        </div>
        <div class="form__item <?= key_exists('password', $errors) ? 'form__item--invalid' : '' ?>">
            <label for="password">Пароль*</label>
            <input id="password" type="text" name="password" placeholder="Введите пароль"
                   value="<?= $data['password'] ?? '' ?>">
            <? if (key_exists('password', $errors)) : ?>
                <span class="form__error"><?= $errors['password'] ?></span>
            <? endif; ?>
        </div>
        <button type="submit" class="button">Войти</button>
    </form>
</main>
