function togglePassword() {

    let password =
        document.getElementById("password");

    if(password.type === "password"){
        password.type = "text";
    } else {
        password.type = "password";
    }
}

function validateLogin(){

    let username =
        document.getElementById("username").value;

    let password =
        document.getElementById("password").value;

    if(username === "" || password === ""){
        alert("Please fill all fields");
        return false;
    }

    return true;
}

function validateSignup(){

    let fullname =
        document.getElementById("fullname").value;

    let username =
        document.getElementById("username").value;

    let password =
        document.getElementById("password").value;

    let confirm =
        document.getElementById("confirm").value;

    if(
        fullname === "" ||
        username === "" ||
        password === "" ||
        confirm === ""
    ){
        alert("Please fill all fields");
        return false;
    }

    if(password.length < 5){
        alert("Password must be minimum 5 characters");
        return false;
    }

    if(password !== confirm){
        alert("Passwords do not match");
        return false;
    }

    return true;
}