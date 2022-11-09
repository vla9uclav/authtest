
// Отправляет dataQuery к файлу urlQuery через ajax запрос с типом POST
function ajaxQuery(urlQuery, dataQuery, errorFunction = null) {
    $.ajax({
        url: urlQuery,
        headers: { 'HTTP_X_REQUESTED_WITH': 'XMLHttpRequest' },
        type: 'POST',
        dataType: 'json',
        data: dataQuery,
        success(data) {
            if (data.status) {
                location.href = 'http://authtest';
            } else {
                if(errorFunction != null){
                    errorFunction(data);
                }
            }
        }
    });
}

// Обрабатывает поведение кнопки submit
function resetSubmitButtonAction(button, event) {

    // Сбрасывает отправку формы по нажатию, чтобы избежать перезагрузки страницы
    event.preventDefault();

    // Отключает кнопку на 2 секунды, чтобы избежать спама 
    setDisabledAttrToButton(button, 1500);
}

// Устанавливает аттрибут disabled для отключения кнопки
function setDisabledAttrToButton(button, delayForDisable = 0) {
    $(button).attr("disabled", true);

    if (delayForDisable > 0) {
        setTimeout(() => {
            $(button).attr("disabled", false);
        }, delayForDisable);
    }
}

