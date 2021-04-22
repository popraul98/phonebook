function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("btnUpD").style.display = "none";
    document.getElementById("btnAdd").style.display = "inline";
    document.getElementById("new_input_name").value = "";
    document.getElementById("new_input_number").value = "";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

function openFormUpdate() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("btnAdd").style.display = "none";
    document.getElementById("btnUpD").style.display = "inline";

}