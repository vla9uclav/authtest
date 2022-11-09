<body>
    <noscript>
        <style type="text/css">
            .form-wrapper {
                display: none !important;
            }
        </style>
        <div class="no-js-message">
            <h2>Добро пожаловать!</h2>
            <h3>Для корректной работы страницы необходимо включить javascript!</h3>
        </div>
    </noscript>

    <section class="form-wrapper">
        <link rel="stylesheet" type="text/css" href="assets/css/auth.css">

        <div class="form-base style-form-shadow" id="sign_in_form" style="z-index: 2; display:none;">
            <div class="container-2-columns">
                <div class="column-item form-img">
                    <img src="assets/img/sign-in-img_800px.png" alt="Вход в учетную запись">
                </div>
                <div class="column-item">
                    <h2>Вход в учетную запись</h2>
                    <form method="POST">
                        <div class="input-wrapper">
                            <input class="input-text" type="text" name="sign_in_login" placeholder="Логин" required tabindex="1">
                            <span class="input-icon"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g id="_01_user" data-name="01 user">
                                        <path d="m9 9a7 7 0 1 1 7 7 7.008 7.008 0 0 1 -7-7zm14.892 9h-15.784a3.112 3.112 0 0 0 -3.108 3.108v5.784a3.112 3.112 0 0 0 3.108 3.108h15.784a3.112 3.112 0 0 0 3.108-3.108v-5.784a3.112 3.112 0 0 0 -3.108-3.108z" />
                                    </g>
                                </svg></span>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-text" type="password" name="sign_in_password" placeholder="Пароль" required tabindex="2">
                            <span class="input-icon"><svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m20 12c0-1.103-.897-2-2-2h-1v-3c0-2.757-2.243-5-5-5s-5 2.243-5 5v3h-1c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2zm-11-5c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6z" />
                                </svg></span>
                        </div>
                        <div class="form-additional">
                            <div class="form-error-message"></div>
                            <div class="form-additional-link">
                                <input class="input-arrow" type="button" id="change_to_sign_up_button" value="У меня нет аккаунта" tabindex="3">
                            </div>
                        </div>
                        <button class="button-submit" type="submit" name="submit_sign_in" tabindex="4">Войти</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="form-base style-form-shadow" id="sign_up_form" style="z-index: 1; display:none;">
            <div class="container-2-columns">
                <div class="column-item">
                    <h2>Регистрация учетной записи</h2>
                    <form method="POST">
                        <div class="input-wrapper">
                            <input class="input-text" type="text" name="sign_up_login" placeholder="Логин" required tabindex="1">
                            <span class="input-icon"><svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g id="_01_user" data-name="01 user">
                                        <path d="m9 9a7 7 0 1 1 7 7 7.008 7.008 0 0 1 -7-7zm14.892 9h-15.784a3.112 3.112 0 0 0 -3.108 3.108v5.784a3.112 3.112 0 0 0 3.108 3.108h15.784a3.112 3.112 0 0 0 3.108-3.108v-5.784a3.112 3.112 0 0 0 -3.108-3.108z" />
                                    </g>
                                </svg></span>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-text" type="name" name="sign_up_name" placeholder="Имя" required tabindex="2">
                            <span class="input-icon"><svg viewBox="0 -43 512 512" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m453.332031 42.667969h-112v-5.335938c0-20.585937-16.746093-37.332031-37.332031-37.332031h-96c-20.585938 0-37.332031 16.746094-37.332031 37.332031v5.335938h-112c-32.363281 0-58.667969 26.300781-58.667969 58.664062v266.667969c0 32.363281 26.304688 58.667969 58.667969 58.667969h394.664062c32.363281 0 58.667969-26.304688 58.667969-58.667969v-266.667969c0-32.363281-26.304688-58.664062-58.667969-58.664062zm-154.644531 42.664062h-85.355469v-42.664062h85.335938zm-138.6875 64c29.398438 0 53.332031 23.9375 53.332031 53.335938 0 29.394531-23.933593 53.332031-53.332031 53.332031s-53.332031-23.9375-53.332031-53.332031c0-29.398438 23.933593-53.335938 53.332031-53.335938zm96 197.335938c0 8.832031-7.167969 16-16 16h-160c-8.832031 0-16-7.167969-16-16v-10.667969c0-32.363281 26.304688-58.667969 58.667969-58.667969h74.664062c32.363281 0 58.667969 26.304688 58.667969 58.667969zm176 16h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0-85.335938h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0-85.332031h-117.332031c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h117.332031c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" />
                                </svg></span>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-text" type="email" name="sign_up_email" placeholder="Email" required tabindex="3">
                            <span class="input-icon"><svg enable-background="new 0 0 32 32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <g fill="none">
                                        <path d="m31 7.28v3.49l-13.13 4.1c-1.22.38-2.52.38-3.74 0l-13.13-4.1v-3.49c0-.98.8-1.78 1.78-1.78h26.44c.98 0 1.78.8 1.78 1.78z" />
                                        <path d="m31 12.86v11.86c0 .98-.8 1.78-1.78 1.78h-26.44c-.98 0-1.78-.8-1.78-1.78v-11.86l12.53 3.92c.81.25 1.64.38 2.47.38s1.66-.1299 2.47-.3799z" />
                                    </g>
                                </svg></span>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-text" type="password" name="sign_up_password" placeholder="Пароль" required tabindex="4">
                            <span class="input-icon"><svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m20 12c0-1.103-.897-2-2-2h-1v-3c0-2.757-2.243-5-5-5s-5 2.243-5 5v3h-1c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2zm-11-5c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6z" />
                                </svg></span>
                        </div>
                        <div class="input-wrapper">
                            <input class="input-text" type="password" name="sign_up_confirm_password" placeholder="Подтвердите пароль" required tabindex="5">
                            <span class="input-icon"><svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="m20 12c0-1.103-.897-2-2-2h-1v-3c0-2.757-2.243-5-5-5s-5 2.243-5 5v3h-1c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2h12c1.103 0 2-.897 2-2zm-11-5c0-1.654 1.346-3 3-3s3 1.346 3 3v3h-6z" />
                                </svg></span>
                        </div>
                        <div class="form-additional">
                            <div class="form-error-message"></div>
                            <div class="form-additional-link">
                                <input class="input-arrow" type="button" id="change_to_sign_in_button" value="У меня есть аккаунт" tabindex="6">
                            </div>
                        </div>
                        <button class="button-submit" type="submit" name="submit_sign_up" tabindex="7">Зарегистрироваться</button>
                    </form>
                </div>
                <div class="column-item form-img">
                    <img src="assets/img/sign-up-img_800px.png" alt="Регистрация учетной записи">
                </div>
            </div>
        </div>

        <script src="assets/js/startFormAnimation.js"></script>
        <script src="assets/js/slideForm.js"></script>
        <script src="assets/js/authorization.js"></script>
    </section>
</body>