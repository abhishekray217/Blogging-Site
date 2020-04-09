function validate(inpid, errid) {
    var inputElement = document.getElementById(inpid);
    var errElement = document.getElementById(errid);
    console.log(inputElement);
    if (inputElement.value.length == "") {
        errElement.style.color = "red";
        errElement.style.display = "block";
        errElement.innerHTML = "**Cannot be empty";
    } else {
        errElement.style.color = "green";
        errElement.style.display = "block";
        errElement.innerHTML = "Filled";
    }
}

function validat() {
    var mail = document.getElementById("email").value.length;
    var passs = document.getElementById("pass").value.length;
    if (mail == "") {
        alert("Email must be filled out");
        return false;
    }
    if (passs == "") {
        alert("Password must be filled out");
        return false;
    }
}