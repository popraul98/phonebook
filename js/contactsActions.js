var PB = PB || {};
PB.next_id_number = last_id;
PB.remember = null;

function addButtonDeleteAtTask(contact) {
    contact = contact + `  <button  type="button" id="btn_${PB.next_id_number - 1}"  onclick="PB.delete(this)"><i class="fas fa-trash-alt"></i></button>`;
    return contact;
}

function addButtonChangeTask(task, id_task) {
    task = task + `  <button  type="button" onclick="ChangeTask(${id_task})">Change Task</button></li>`;
    return task;
}

function changeContact(current) {
    openFormUpdate();
    PB.curent_contact = current;
    let id = current.id;
    let id_contact = id.match(/(\d+)/);
    PB.remember = parseInt(id_contact);
    document.getElementById("new_input_name").value = document.getElementById("cona_" + PB.remember).innerHTML;
    document.getElementById("new_input_number").value = document.getElementById("cono_" + PB.remember).innerHTML;
}

PB.add = async function () {
    try {
        let result = await AJAX.post("new_name_contact=" + document.getElementById("new_input_name").value
            + "&new_number_contact=" + document.getElementById("new_input_number").value, "addContact.php");
    } catch (e) {
        document.getElementById("txtHint").innerHTML = e;
    }
};

PB.delete = async function (current) {
    PB.curent_contact = current;
    let id = current.id;
    let id_contact = id.match(/(\d+)/);
    id_contact = parseInt(id_contact);
    try {
        let result = await AJAX.post("id-contact=" + id_contact, "deleteContact.php?")
        if (result) {
            document.getElementById("con_" + id_contact).remove();
        }
    } catch (e) {
        document.getElementById("txtHint").innerHTML = e;
    }
};

PB.update = async function () {
    let new_name = document.getElementById("new_input_name").value;
    let new_number = document.getElementById("new_input_number").value;
    try {
        let result = await AJAX.post("id-contact=" + PB.remember + "&name-updated=" + new_name + "&number-updated=" + new_number, "updateContact.php");
        if (result) {
            document.getElementById("cona_" + PB.remember).innerHTML = new_name;
            document.getElementById("cono_" + PB.remember).innerHTML = new_number;
            document.getElementById("new_input_name").value = "";
            document.getElementById("new_input_number").value = "";
            PB.remember = null;
        }
    } catch (error) {
        document.getElementById("txtHint").innerHTML = error;
    }

};