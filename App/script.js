var passwordOK;
var passwordEqual;

function validateEmail()
{
     let inputEmail = document.getElementById("emailValid");
     let format =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (inputEmail.value.match(format))
     {
         inputEmail.style.color="rgb(0, 153, 0)";
         return true;
     } else {
         inputEmail.style.color="red";
         return false;
     }
}

function checkPassword(password)
{
    let heslo = password.value;
    let dlzka = heslo.length;
    let znaky = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
    let pismena = /[a-zA-Z]/;
    let obsahujeCislo = false;
    let txt;
    for (let i = 0; i < dlzka; i++) {
        if (heslo.charAt(i) >= '0' && heslo.charAt(i) <= '9')
        {
            obsahujeCislo = true;
        }
    }
    if (((dlzka > 9) && (pismena.test(heslo)))
        || (( dlzka > 9) && obsahujeCislo)
        || ((dlzka > 9) && (pismena.test(heslo)) && obsahujeCislo)
        || ((dlzka > 8) && (pismena.test(heslo)) && (obsahujeCislo && (znaky.test(heslo)))))
    {
        txt = "silné heslo";
        document.getElementById("kontrolaHesla").style.color="green";
        passwordOK=true;
    }
    if (((7 < dlzka && dlzka <=9) && (pismena.test(heslo)))
        || ((7< dlzka && dlzka <=9) && obsahujeCislo)
        || ((6 < dlzka && dlzka <=9) && (pismena.test(heslo)) && obsahujeCislo)
        || ((5 < dlzka && dlzka <= 8) && (pismena.test(heslo)) && obsahujeCislo&& (znaky.test(heslo))))
    {
        txt = "dobré heslo";
        document.getElementById("kontrolaHesla").style.color="orange";
        passwordOK=true;
    }
    if (((dlzka <=7) && (pismena.test(heslo)))
        || ((dlzka <=7) && obsahujeCislo)
        || ((dlzka <=6) && (pismena.test(heslo)) && obsahujeCislo)
        || ((dlzka <= 5) && (pismena.test(heslo)) && obsahujeCislo && (znaky.test(heslo))))
    {
        txt = "slabé heslo";
        document.getElementById("kontrolaHesla").style.color="red";
        passwordOK=false;
    }
    document.getElementById("kontrolaHesla").innerHTML = txt;
}


function equalPassword(passwordAgain, password)
{
    let heslo = password.value;
    let hesloZnovu = passwordAgain.value;
    let txt;
    if (heslo == hesloZnovu)
    {
        txt = "heslá sa rovnajú";
        document.getElementById("rovnostHesla").style.color="green";
        passwordEqual=false;
    } else {
        txt = "heslá sa nerovnajú";
        document.getElementById("rovnostHesla").style.color="red";
        passwordEqual=true;
    }
    document.getElementById("rovnostHesla").innerHTML = txt;
}

function checkMessage()
{
    let message = document.getElementById("mess");
    let popis;
    if (message.value.length > 10)
    {
        popis = "✓";
        document.getElementById("messageOk").style.color="green";
    } else {
        popis = "✗";
        document.getElementById("messageOk").style.color="red";
    }
    document.getElementById("messageOk").innerHTML = popis;
}
