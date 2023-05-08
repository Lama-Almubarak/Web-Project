function passValidation(){

    var pass1 = document.getElementById("pass").value;
    var pass2 = document.getElementById("Cpass").value;

    if (pass1 !== pass2) {
        document.getElementById("Error").style.visibility = 'visible';
        return false;
}
}
document.getElementById("submit").addEventListener("click", passValidation);