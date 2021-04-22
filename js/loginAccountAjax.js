var PB = PB || {}

PB.loginAccount = async function () {
    try {
        let result = await AJAX.post("username=" + $('input[name ="username-login"]')[0].value
            + "&password=" + $('input[name ="password-login"]')[0].value, "php/login.php");
        $(".status-login").html(result);
    } catch (result) {
        $(".status-login").html(result);
    }
};