$("#login").submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: '/../Manao-test-task/scripts/ajax-log.php',
        method: 'post',
        dataType: 'json',
        data: $(this).serialize(),
        success: function (data) {
            if (data.login != null) {
                $("#loginMessage > span").text(data.login);
                setTimeout(() => {
                    $("#loginMessage > span").text(null);
                }, 3000);
            }
            if (data.pass != null) {
                $("#passMessage > span").text(data.pass);
                setTimeout(() => {
                    $("#passMessage > span").text(null);
                }, 3000);
            }
            if (data.message != null) {
                console.log(data.message);
            }
            if (data.redirect != null) {
                window.location.replace(data.redirect);
            }
        }
    });
});