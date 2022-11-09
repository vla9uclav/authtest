$(document).ready(function () {

    //Формы авторизации
    let signInForm = $("#sign_in_form");
    let signUpForm = $("#sign_up_form");

    //Кнопки для смены форм
    let switchToSignInButton = $("#change_to_sign_in_button");
    let switchToSignUpButton = $("#change_to_sign_up_button");

    let animateDuration = 500;

    
    //Кнопка меняет форму входа на форму регистрации
    switchToSignUpButton.click(function () {
        formSlideLeft(signInForm, animateDuration);
        formSlideCenter(signUpForm, animateDuration);
    });

    //Кнопка меняет форму регистрации на форму входа
    switchToSignInButton.click(function () {
        formSlideLeft(signUpForm,  animateDuration);
        formSlideCenter(signInForm, animateDuration);
    });

    //Отодвигает форму за экран влево за промежуток времени
    function formSlideLeft(form, duration) {
        if (form.is(":visible")) {
            form.css({ "z-index": "1" });
            form.animate({ left: '-100vw' }, duration / 1.2);
            form.hide(0);
        }
    }

    //Возвращает форму слева направо к центру экрана за промежуток времени
    function formSlideCenter(form, duration) {
        if (form.is(":hidden")) {
            form.show(0);
            form.css({ "left": "-100vw", "z-index": "2" });
            form.animate({ left: '0' }, duration);
        }
    }
});