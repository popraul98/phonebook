PB.showContactsUser = async function (current) {
    let id = current.id;
    let ids = id.split("_");
    let page = parseInt(ids[0]);
    let id_user = parseInt(ids[1]);
    if (isNaN(page)) {
        page = 1;
    }
    console.log(id_user, "id_user");
    console.log(page);
    try {
        let result = await AJAX.post("id-user=" + id_user + "&page=" + page, "showContactsUser.php?");
        if (result) {
            document.getElementById("table").innerHTML = result;
        }
    } catch (e) {
        document.getElementById("txtHint").innerHTML = e;
    }
};

PB.deleteUser = async function (current) {
    let delete_confirm = confirm("Do you want to delete the user and all it's contacts?");
    if (delete_confirm == true) {
        let id = current.id;
        let id_user = id.match(/(\d+)/);
        id_user = parseInt(id_user);
        try {
            let result = await AJAX.post("id-user=" + id_user, "deleteUser&Contacts.php?")
            if (result) {
                $("#user_" + id_user).remove();
                $("#table-contacts").empty();
                $("#table-contacts").append("<tr><th>Name</th><th>Phone Number</th><th>Actions</th></tr>");

            }
        } catch (e) {
            document.getElementById("txtHint").innerHTML = e;
        }
    }
};

PB.showTableContacts = async function (current) {
    let id = current.id;
    let id_user = id.match(/(\d+)/);
    id_user = parseInt(id_user);
    try {
        let result = await AJAX.post("id-user=" + id_user, "showTableContacts.php?");
        if (result) {
            document.getElementById("table-contacts").innerHTML = result;
        }
    } catch (e) {
        document.getElementById("txtHint").innerHTML = e;
    }
};