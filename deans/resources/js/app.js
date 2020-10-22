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
})


function getUserLogin(el) {
    $('#search_user').val(el.getElementsByTagName('b')[0].innerHTML);
    $('#st_user_res').html('');
}


function getUserLogin_st(el) {
    $('#search_user_st').val(el.getElementsByTagName('b')[0].innerHTML);
    $('#st_user_res_st').html('');
}
