$(document).ready(function () {

    //Форма входа и 
    let signInForm = $("#sign_in_form");
    let userProfileForm = $("#user_profile_form");

    //Появление формы входа при загрузке страницы
    if(signInForm !== undefined){
        signInForm.show(500);
    }

    //Появление формы входа при загрузке страницы
    if (userProfileForm !== undefined){
        userProfileForm.show(400);
    }
});


