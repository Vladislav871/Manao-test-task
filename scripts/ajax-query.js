$("#registration").submit(function (event) {
    event.preventDefault();
    $.ajax({
        url: 'scripts/ajax.php',
        method: 'get',
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
            if (data.confirm_pass != null) {
                $("#confirmMessage > span").text(data.confirm_pass);
                setTimeout(() => {
                    $("#confirmMessage > span").text(null);
                }, 3000);
            }
            if (data.email != null) {
                $("#emailMessage > span").text(data.email);
                setTimeout(() => {
                    $("#emailMessage > span").text(null);
                }, 3000);
            }
            if (data.names != null) {
                $("#nameMessage > span").text(data.names);
                setTimeout(() => {
                    $("#nameMessage > span").text(null);
                }, 3000);
            }
            if (data.maessage != null) {
                console.log(data.message);
            }
        }
    });
});