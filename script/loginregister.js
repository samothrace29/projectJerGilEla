// Creating all necessary variable
const btn_login = document.getElementsByClassName("logRegModal-Btn-Login")[0];
const btn_register= document.getElementsByClassName("logRegModal-Btn-Register")[0];
const btn_submit_connection = document.getElementsByClassName("logRegModal-Form-Submit")[0];
const onlyRegistration = document.querySelectorAll (".logRegModal-OnlyForRegistration");
const onlyLogin = document.querySelectorAll (".logRegModal-OnlyForLogin");
console.log ( onlyRegistration );
const title = document.querySelector(".logRegModal-Title");
const formSubmitted = document.getElementsByClassName ("logRegModal-Form")[0];


let logReg_path_Login="";
let logReg_path_Register="";

const regLog_Form = document.getElementsByClassName(".logRegModal-Form")[0];

//alert(btn_login);

// START button btn_login behavior
btn_login.addEventListener ( "click", function (e) {
    e.preventDefault();
         //    alert("");
    title.textContent = "login form";
   
    
    for (let index = 0; index < onlyRegistration.length; index++) {
        const elementToShow = onlyRegistration[index];
        elementToShow.style.display="none";
    }
    for (let index = 0; index < onlyLogin.length; index++) {
        const elementToShow = onlyLogin[index];
        elementToShow.style.display="flex";
    }
    
    btn_submit_connection.innerText="Login into the Chat";
    
    //alert (localPath);
    formSubmitted.action=logReg_path_Login;
    
    //alert("coco");
});
// END button btn_login behavior 

// START button btn_register behavior

btn_register.addEventListener ( "click", function (e) {
    e.preventDefault();
    //alert("");
    title.innerText = "register form";
                for (let index = 0; index < onlyRegistration.length; index++) {
                    const elementToShow = onlyRegistration[index];
                    elementToShow.style.display="block";
                    
                }
                for (let index = 0; index < onlyLogin.length; index++) {
                    const elementToShow = onlyLogin[index];
                    elementToShow.style.display="none";
                    
                }
    btn_submit_connection.innerText="Register to chat application";
    //alert (pathRegister);
    formSubmitted.action=logReg_path_Register;
    //const divPasswordCfm = document.querySelector (".chat_div_passwordCfm");
});
// END button btn_register behavior 

// START button btn_submit_connection behavior
btn_submit_connection.addEventListener ("submit" , function (e) {
    e.preventDefault();

//    alert("coco");
});
// END button btn_submit_connection behavior

// send event for click simulator
// logRegModal = reg or log
// path = which script run
function showModalLogin(event, path) {
    const logReg = document.getElementsByClassName("logRegModal-Content")[0];
    logReg.style.display = "block";

    logReg_path_Login=path;
    formSubmitted.action=logReg_path_Login;
    
    btn_login.click();
}
function showModalRegister(event, path) {
    const logReg = document.getElementsByClassName("logRegModal-Content")[0];
    logReg.style.display = "block";

    logReg_path_Register = path;
    formSubmitted.action=path;
    //localPath=path;

    btn_register.click();
}


//alert("fin");
