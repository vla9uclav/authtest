$(document).ready(function () {

    let exitSubmitButton = $('#user_profile_form button[name="exit_submit_button"]');
    let userLogin = $('#user_login').val().trim();
    
    // Уничтожает скрытый input со значением логина
    $('#user_login').remove();

    // При нажатии на кнопку выхода отправляем данные через ajax
    exitSubmitButton.click(function (event) {

        resetSubmitButtonAction(this, event); // обращение к файлу queryBase.js
        data = {userLogin : userLogin};

        // Отправляет запрос на удаление куки для выхода из аккаунта
        ajaxQuery('../app/core/actionProfileExit.php', data); // обращение к файлу queryBase.js
    });
});