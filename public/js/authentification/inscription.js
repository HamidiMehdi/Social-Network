'use strict';
let inscriptionFunc = {
    checkSubmit: function () {
        let firstName = $('#inscription_form_first_name').val().trim();
        let lastName = $('#inscription_form_last_name').val().trim();
        let username = $('#inscription_form_username').val().trim();
        let password = $('#inscription_form_password').val().trim();
        let email = $('#inscription_form_email').val().trim();
        let birthday = $('#inscription_form_birthday').val().trim();
        let good = true;

        if (firstName === "") {
            $('#error_first_name').css('display', 'block');
            good = false;
        } else {
            $('#error_first_name').css('display', 'none');
        }

        if (lastName === "") {
            $('#error_last_name').css('display', 'block');
            good = false;
        } else {
            $('#error_last_name').css('display', 'none');
        }

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

        if (email === "") {
            $('#error_email').css('display', 'block');
            good = false;
        } else {
            $('#error_email').css('display', 'none');
        }

        if (birthday === "") {
            $('#error_birthday').css('display', 'block');
            good = false;
        } else {
            $('#error_birthday').css('display', 'none');
        }

        if (good === false) {
            return;
        }

        console.log(good);
        $('form').submit();
    }
};

let inscriptionListener = {
    onLoad: function () {
        inscriptionListener.onClick();

        let foopicker = new FooPicker({
            id: 'inscription_form_birthday',
            dateFormat: 'dd/MM/yyyy',
            months: ['Jancc', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        });

    },
    onClick: function () {
        $('button.submit').click(function (e) {
            e.preventDefault();
            inscriptionFunc.checkSubmit();
        });
    }
};

$(document).ready(function () {
    $(window).ready(function () {
        inscriptionListener.onLoad();
    });
});