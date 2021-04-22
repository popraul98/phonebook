var AJAX = AJAX || {}

AJAX.post = function (data_string_update,php_file) {
    return new Promise((resolve, reject) => {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText.includes("#ERR")) {
                    reject(this.responseText);
                }
                resolve(this.responseText);
            } else if (this.readyState == 4 && this.status != 200) {
                reject("nu merge");
            }
        };
        xmlhttp.open("POST", php_file, true);
        xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xmlhttp.send(data_string_update);
    });
};