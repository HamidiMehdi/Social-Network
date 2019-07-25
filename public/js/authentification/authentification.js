'use strict';
let authentificationFunc = {
    checkSubmit: function () {
        let username = $('#form_username').val().trim();
        let password = $('#form_password').val().trim();
        let good = true;

        if (username === "") {
            $('#error_username').css('display', 'block');
            good = false;
        } else {
            $('#error_username').css('display', 'none');
        }

        if (password === "") {
            $('#error_password').css('display', 'block');
            good = false;
        } else {
            $('#error_password').css('display', 'none');
        }

        if (good === false) {
            return;
        }
        $(form).submit();
    }
};

let authentificationListener = {
    onLoad: function () {
        authentificationListener.onClick();
    },
    onClick: function () {
        $('button.submit').click(function (e) {
            e.preventDefault();
            authentificationFunc.checkSubmit();
        });
    }
};

$(document).ready(function () {
    $(window).ready(function () {
        authentificationListener.onLoad();
    });
});