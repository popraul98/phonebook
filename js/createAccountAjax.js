var PB = PB || {}

PB.createAccount = async function () {
    if (!checkFields()) {
        return false;
    }
    try {
        let result = await AJAX.post("username=" + $('input[name ="username"]')[0].value
            + "&password=" + $('input[name ="password"]')[0].value
            + "&email_user=" + $('input[name ="email-user"]')[0].value, "php/createAccount.php");
        $(".status-registration").html(result);
        clearFields();
    } catch (result) {
        $(".status-registration").html(result);
    }
};

function checkFields() {
    $(".status-registration").html(""); //emplty status

    if (!isAllFieldsCompleted()) {
        $(".status-registration").html("Fill all fields");
        return false;
    }
    if (!isRePasswordSameWithPassword()) {
        $(".status-registration").html("Please make sure your passwords match.");
        return false;
    }
    return true;
    // $(".status-registration").html("Account created successfully! Back to Login");
}

function isAllFieldsCompleted() {
    if ($('input[name ="username"]')[0].value == "") {
        return false;
    }
    if ($('input[name ="password"]')[0].value == "") {
        return false;
    }
    if ($('input[name ="re-password"]')[0].value == "") {
        return false;
    }
    return true;
}

function isRePasswordSameWithPassword() {
    if ($('input[name ="password"]')[0].value != $('input[name ="re-password"]')[0].value) {
        return false;
    }
    return true;
}

function clearFields() {
    $('input[name ="username"]')[0].value = "";
    $('input[name ="password"]')[0].value = "";
    $('input[name ="re-password"]')[0].value = "";
    $('input[name ="email-user"]')[0].value = "";
}
