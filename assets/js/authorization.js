$(document).ready(function () {
    
    // Кнопки и поля ввода формы входа
    let signInLogin = $('#sign_in_form input[name="sign_in_login"]');
    let signInPassword = $('#sign_in_form input[name="sign_in_password"]');
    let signInSubmitButton = $('#sign_in_form button[name="submit_sign_in"]');
    let signInErrorField = $('#sign_in_form .form-error-message')[0];

    // Кнопки и поля ввода формы регистрации
    let signUpLogin = $('#sign_up_form input[name="sign_up_login"]');
    let signUpName = $('#sign_up_form input[name="sign_up_name"]');
    let signUpEmail = $('#sign_up_form input[name="sign_up_email"]');
    let signUpPassword = $('#sign_up_form input[name="sign_up_password"]');
    let signUpConfirmPassword = $('#sign_up_form input[name="sign_up_confirm_password"]');
    let signUpSubmitButton = $('#sign_up_form button[name="submit_sign_up"]');
    let signUpErrorField = $('#sign_up_form .form-error-message')[0];

    // Последний input в котором была ошибка
    let lastInputError;
    
    // При нажатии на кнопку входа отправляем данные через ajax из формы входа
    signInSubmitButton.click(function (event) {

        resetSubmitButtonAction(this, event); // обращение к файлу queryBase.js
        hideFormError(signInErrorField, lastInputError);

        // Собирает данные из формы входа
        let signInData = {
            signInLogin: signInLogin.val().trim(),
            signInPassword: signInPassword.val().trim()
        };

        // Отправляет запрос на вход к файлу queryBase.js
        ajaxQuery('../app/core/actionSignIn.php', signInData, showSignInFormError);
    });

    // При нажатии на кнопку регистрации отправляем данные через ajax из формы регистрации
    signUpSubmitButton.click(function (event) {

        resetSubmitButtonAction(this, event); // обращение к файлу queryBase.js
        hideFormError(signUpErrorField, lastInputError);

        // Собирает данные из формы регистрации
        let signUpData = {
            signUpLogin: signUpLogin.val().trim(),
            signUpName: signUpName.val().trim(),
            signUpEmail: signUpEmail.val().trim(),
            signUpPassword: signUpPassword.val().trim(),
            signUpConfirmPassword: signUpConfirmPassword.val().trim()
        };

        // Отправляет запрос на регистрацию к файлу queryBase.js
        ajaxQuery('../app/core/actionSignUp.php', signUpData, showSignUpFormError);
    });

    // В форме sign in добавляет класс ошибки к input и показывает поле с текстом ошибки
    function showSignInFormError(data) {
        if(data !== undefined & data !== null){
            setInputErrorClass($('input[name=' + data.inputName + ']'), true);
            alertErrorField(signInErrorField, data.message, true);
        }
    }

    // В форме sign up добавляет класс ошибки к input и показывает поле с текстом ошибки
    function showSignUpFormError(data) {
        if (data !== undefined & data !== null) {
            setInputErrorClass($('input[name=' + data.inputName + ']'), true);
            alertErrorField(signUpErrorField, data.message, true);
        }
    }

    // Показывает сообщение об ошибке
    function alertErrorField(errorField, message = '', active) {
        if (active) {
            $(errorField).css({ height: 'auto' });
            $(errorField).html(message);
            $(errorField).animate({ opacity: '1' }, 100);

        } else {
            $(errorField).css({ height: '0px' });
            $(errorField).animate({ opacity: '0' }, 50);
        }
    }

    // Добавляет или удаляет класс ошибки для input
    function setInputErrorClass(input, statusError) {
        if (input !== undefined & input !== null){
            lastInputError = input;

            if (statusError) {
                $(input).addClass('error');
            } else {
                $(input).removeClass('error');
            }
        }
    }

    // Удаляет класс ошибки у input и скрывает поле с текстом ошибки
    function hideFormError(errorField, inputName) {

        // Проверяет пустой ли inputName
        if (inputName !== undefined || inputName !== null) {
            setInputErrorClass(inputName, false);
        }

        alertErrorField(errorField, false);
    }
});