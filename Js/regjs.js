function validate(inpid, errid) {
    var inputElement = document.getElementById(inpid);
    var errElement = document.getElementById(errid);
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

function validatepass(pasid, passid,epass3) {
    var pass1 = document.getElementById(pasid).value;
    var pass2 = document.getElementById(passid).value;
    var epass = document.getElementById(epass3);
    if (pass1 != pass2) {
        epass.style.color = "red";
        epass.style.display = "block";
        epass.innerHTML = "**Password Not matching";
    } else {
        epass.style.color = "Green";
        epass.style.display = "block";
        epass.innerHTML = "**Correct";
    }
}

function validateform() {
    var fname = document.getElementById("fname").value.length;
    var lname = document.getElementById("lname").value.length;
    var uname = document.getElementById("uname").value.length;
    var email = document.getElementById("email").value.length;
    var phone = document.getElementById("phone").value.length;
    var pass1 = document.getElementById("pass1").value.length;
    var pass2 = document.getElementById("pass2").value.length;
    if (fname == "") {
        alert("First name must be filled");
        return false;
    }
    if (lname == "") {
        alert("Last name must be filled");
        return false;
    }
    if (uname == "") {
        alert("User name must be filled");
        return false;
    }
    if (email == "") {
        alert("E-mail must be filled");
        return false;
    }
    if (phone == "") {
        alert("Phone-No. must be filled");
        return false;
    }
    if (pass1 == "") {
        alert("Pasword must be filled");
        return false;
    }
    if (pass2 == "") {
        alert("Pasword must be filled");
        return false;
    }
}
