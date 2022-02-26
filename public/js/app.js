// require('./bootstrap');

$('document').ready(function () {
    $('#search_user').on('keyup', function () {
        $.get('/get_search_login?login=' + $('#search_user').val(), function (data) {
            console.log(data);
            let user_date = '';

            for (i = 0; i < data['user'].length; i++) {
                user_date += "<li class=\"list-group-item\" onclick='getUserLogin(this)'><b>" + data['user'][i]['login'] + "</b>" +
                    " " + data['user'][i]['name'] + " " + data['user'][i]['lastname'] + "</li>";
            }
            $('#st_user_res').html(user_date);

            $('#st_user_res_container').width($('#search_user').width());
        });
    });


    $('#search_user_st').on('keyup', function () {
        $.get('/get_search_login?login=' + $('#search_user_st').val(), function (data) {
            console.log(data);
            let user_date = '';

            for (i = 0; i < data['user'].length; i++) {
                user_date += "<li class=\"list-group-item\" onclick='getUserLogin_st(this)'><b>" + data['user'][i]['login'] + "</b>" +
                    " " + data['user'][i]['name'] + " " + data['user'][i]['lastname'] + "</li>";
            }
            $('#st_user_res_st').html(user_date);

            $('#st_user_res_container_st').width($('#search_user_st').width());
        });
    });

    $('#login_reset').on('keyup', function () {
        $.get('/get_search_login?login=' + $('#login_reset').val(), function (data) {
            console.log(data);
            let user_date = '';

            for (i = 0; i < data['user'].length; i++) {
                user_date += "<li class=\"list-group-item\" onclick='getUserLogin_login_drop(this)'><b>" + data['user'][i]['login'] + "</b>" +
                    " " + data['user'][i]['name'] + " " + data['user'][i]['lastname'] + "</li>";
            }
            $('#st_user_res_login_reset').html(user_date);

            $('#st_user_res_container_login_reset').width($('#search_user_login_reset').width());
        });
    });

    $('#new_password').on('keyup', checkPassword);
    $('#new_password2').on('keyup', checkPassword);
})

function checkPassword() {
    if ($('#new_password').val() === $('#new_password2').val()) {
        $('#new_password').removeClass('is-invalid');
        $('#new_password2').removeClass('is-invalid');
        $('#btn_reset_pass'). attr("disabled", false);
    } else {
        $('#new_password').addClass('is-invalid');
        $('#new_password2').addClass('is-invalid');
        $('#btn_reset_pass'). attr("disabled", true);
    }
}

function getUserLogin(el) {
    $('#search_user').val(el.getElementsByTagName('b')[0].innerHTML);
    $('#st_user_res').html('');
}


function getUserLogin_st(el) {
    $('#search_user_st').val(el.getElementsByTagName('b')[0].innerHTML);
    $('#st_user_res_st').html('');
}

function getUserLogin_login_drop(el) {
    $('#login_reset').val(el.getElementsByTagName('b')[0].innerHTML);
    $('#st_user_res_login_reset').html('');
}
