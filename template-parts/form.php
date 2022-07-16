<section>
    <div class="form-container container">
        <div class="form-wrapper">
            <h3 class="form-headline">Подключиться просто!</h3>
            <?php echo do_shortcode('[contact-form-7 id="10" title="Контактная форма 1"]'); ?>

            <!-- Оставил сверстанную форму ниже, чтобы можно было использовать без плагина CF7 -->

            <!-- <form action="" method="post" class="form">
                <div class="form-services--fields">
                    <div class="form-services--field">
                        <input type="radio" name="service" id="internet" value="Интернет">
                        <label for="internet" class="form-field--radio">Интернет</label>
                    </div>
                    <div class="form-services--field">
                        <input type="radio" name="service" id="internet+tv" checked value="Интернет+ТВ">
                        <label for="internet+tv" class="form-field--radio form-field--checked">Интернет+ТВ</label>
                    </div>
                    <div class="form-services--field">
                        <input type="radio" name="service" id="telephone" value="Телефония">
                        <label for="telephone" class="form-field--radio">Телефония</label>
                    </div>
                    <div class="form-services--field">
                        <input type="radio" name="service" id="video" value="Видеоналюдение">
                        <label for="video" class="form-field--radio">Видеоналюдение</label>
                    </div>
                </div>
                <div class="form-contacts--fields">
                    <label for="name_client" class="form-field--text form-name">
                        <input type="text" name="name_client" id="name_client" placeholder="Имя" required pattern="[a-zA-Zа-яА-ЯёЁ ]+">
                    </label>
                    <label for="phone" class="form-field--text form-phone">
                        <input type="text" name="phone" id="phone" placeholder="Телефон" required pattern="\+7\s?[\(]{0,1}[0-9]{3}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}">
                    </label>
                    <input type="submit" value="Отправить" class="btn form-submit">
                </div>
                <label class="form-agreement--field" for="agreement">
                    <input type="checkbox" name="agreement" id="agreement" required checked>
                    <div class="form-agreement--checkbox element-checkbox"></div>
                    <div class="form-agreement--text">Я соглашаюсь на условия <a class="form-agreement--link" href="http://">обработки данных</a></div>
                </label>
            </form> -->
        </div>
    </div>
</section>