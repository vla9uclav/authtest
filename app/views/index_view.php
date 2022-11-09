<body>
    <section class="user-profile-wrapper">
        <div class="user-profile style-form-shadow" id="user_profile_form" style="z-index: 2; display:none;">
            <h2>Добро пожаловать, <?= $data['name'] ?>!</h2>
            <div class="container-2-columns">

                <div class="column-item">
                    <img src="assets/img/user-avatar-img_800px.png" alt="Аватар пользователя">
                </div>

                <div class="user-data-wrapper column-item">

                    <div class="user-data container-2-columns">
                        <div class="user-title column-item">Имя:</div>
                        <div class="user-content column-item"><?= $data['name'] ?></div>
                    </div>
                    <div class="user-data container-2-columns">
                        <div class="user-title column-item">Логин:</div>
                        <div class="user-content column-item"><?= $data['login'] ?></div>
                    </div>
                    <div class="user-data container-2-columns">
                        <div class="user-title column-item">Email:</div>
                        <div class="user-content column-item"><?= $data['email'] ?></div>
                    </div>

                </div>
            </div>

            <div class="user-additional">
                <form method="post">
                    <input id="user_login" type="hidden" value="<?= $data['login'] ?>"/>
                    <button class="button-submit" name="exit_submit_button" type="submit">Выйти</button>
                </form>
            </div>
        </div>
    </section>

    <script src="assets/js/profile.js"></script>
    <script src="assets/js/startFormAnimation.js"></script>
</body>