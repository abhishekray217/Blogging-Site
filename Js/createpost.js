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

function validateform() {
    var title = document.getElementById("title").value.length;
    var desc = document.getElementById("desc").value.length;
    if (title == "") {
        alert("Title name must be filled");
        return false;
    }
    if (desc == "") {
        alert("Describe the Blog");
        return false;
    }
}