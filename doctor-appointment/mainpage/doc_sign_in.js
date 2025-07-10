function validateform() {
    let name=document.getElementById('doctorName').value;
    let password=document.getElementById('doctorPassword').value;
    let ppattern = /^[0-9A-Za-z@#&%*]{10}$/;
    let pname = /^[a-zA-Z.\s]+$/;
    let valid = true;
    if (!ppattern.test(password)) {
        document.getElementById("passworderror").innerHTML= "Password should be up to 10 characters and include only alphabets, numbers, or special characters like @#&%*";
        valid = false;
    }
    if (!pname.test(name)) {
        document.getElementById("nameerror").innerHTML="Please enter a valid name (only alphabets, dots, and spaces allowed)";
        valid = false;
    }
    return valid;
}
