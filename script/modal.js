const btn_loginModal2 = document.getElementById ("idLoginModal");
const btn_registerModal2 = document.getElementById ("idRegisterModal");
//const divContent = document.getElementsByClassName("logRegModal-Content");

if ( btn_loginModal2 ) {

    btn_loginModal2.addEventListener("click", function(e) {
        // this showModalLogin will show modal, and set target of submit button on ./chat/login/ , set any other path , if you want using your own script 
        showModalLogin(e, "login.php");
        
    });
}

if ( btn_registerModal2 ) {

    btn_registerModal2.addEventListener("click", function(e) {
        // this showModalRegister will show modal, and set target of submit button on ./chat/login/ , set any other path , if you want using your own script 
        showModalRegister(e, "signup.php");
        
    });
}