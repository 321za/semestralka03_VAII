


function setMode() {
    let pinkMode = localStorage.getItem('pinkMode');
    console.log(localStorage.getItem('pinkMode'));

    if (pinkMode === 'pink') {
        $('body').removeClass('normal');
        $('body').addClass("pink");
        localStorage.setItem('pinkMode', 'normal');
        console.log(localStorage.getItem('pinkMode'));
    } else {
        $('body').removeClass('pink');
        $('body').addClass("normal");
        localStorage.setItem('pinkMode', 'pink');
        console.log(localStorage.getItem('pinkMode'));
    }
}

$(document).ready(function (){
    if (localStorage.getItem('pinkMode') == 'pink') {
        $('body').removeClass('pink');
        $('body').addClass("normal");
    } else {
        $('body').removeClass('normal');
        $('body').addClass("pink");
    }

    $('#form4').submit(function (e){
        e.preventDefault();

        let text = $('#text').val();

        $.ajax({
            type: "POST",
            url: 'http://localhost/semestralka03?c=review&a=addReview',
            data: {
                text: text,
            },
            success: function (data){
                let jsonData = JSON.parse(data);
                if (jsonData.name != "")
                {
                    alert(jsonData.name + " " + text);
                    $('#tableReview').append("<tr><td>" + "<h5>"+ jsonData.name +"<h5>"+ "</td><td>" + "<p>"+text +"</p>" + '</td><td><button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block delBut" dataId="<?php echo $reviews->getId() ?>" ><i class="bi bi-trash-fill"></i></button></td></tr>');

                } else {
                    alert("Nepodarilo sa pridat recenziu!");
                }
            },
            error: function (){
                alert("ERROR");
            }
        })
        $('#myModal').modal('hide');

    })
});


$(document).ready(function() {
    $(document).on('click', '.delBut', function () {
        let del_id = $(this).attr('dataId');
        /**
         * Metóda closestvráti prvého predka vybraného prvku
         */
        let tr = $(this).closest('tr');


        $.ajax({
            method: 'POST',
            url: 'http://localhost/semestralka03?c=review&a=deleteReview',
            data: {
                deleteItem: del_id,
            },
            success: function (data) {
                let jsonData = JSON.parse(data);

                if (jsonData === 1)
                {
                    tr.fadeOut(1000, function(){
                        $(this).remove();
                    });
                } else {
                    alert("Nemôžeš vymazať cudziu recenziu!");
                }
            }
        })
    })
})





$(document).ready(function() {
    $(document).on('click', '.editButton', function (e) {
        e.preventDefault();
        let edit_id = $(this).attr('dataId');
        let caption = $('#idCaption').val();
        let time = $(this).attr('idTime');
        let capacity = $(this).attr('idCapacity');
        let info = $(this).attr('idInfo');


        $.ajax({
            url: 'http://localhost/semestralka03?c=course&a=ulozZmeny',
            method: "POST",
            data: {id: edit_id,
                    caption :caption,
                    capacity:capacity,
            time:time,
            info:info,
            },
            beforeSend: function () {
                $('.modal-body #caption').val(caption);
                $('.modal-body #capacity').val(capacity);
                $('.modal-body #time').val(time);
                $('.modal-body #info').val(info);
                $('#myModal').modal('show');
            },
            success: function (data) {
                $('.modal-body').html(data);
                $('#myModal').modal('show');
            }
        })
    })
})




function validateName()
{
    let name =  document.getElementById("nameValid");
    let nameValue = name.value;
    nameNumber = false;
    for (let i = 0; i < nameValue.length; i++) {
        if (nameValue.charAt(i) >= '0' && nameValue.charAt(i) <= '9')
        {
            nameNumber = true;
        }
    }
    if (nameNumber) {
        name.style.color="red";
    } else {
        name.style.color="green";
    }
}

function validateSurname()
{
    let name =  document.getElementById("surnameValid");
    let nameValue = name.value;
    nameNumber = false;
    for (let i = 0; i < nameValue.length; i++) {
        if (nameValue.charAt(i) >= '0' && nameValue.charAt(i) <= '9')
        {
            nameNumber = true;
        }
    }
    if (nameNumber) {
        name.style.color="red";
    } else {
        name.style.color="green";
    }
}



function validateEmail()
{
     let inputEmail = document.getElementById("emailValid");
     let format =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
     if (inputEmail.value.match(format))
     {
         inputEmail.style.color="rgb(0, 153, 0)";
     } else {
         inputEmail.style.color="red";
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
    }
    if (((7 < dlzka && dlzka <=9) && (pismena.test(heslo)))
        || ((7< dlzka && dlzka <=9) && obsahujeCislo)
        || ((6 < dlzka && dlzka <=9) && (pismena.test(heslo)) && obsahujeCislo)
        || ((5 < dlzka && dlzka <= 8) && (pismena.test(heslo)) && obsahujeCislo&& (znaky.test(heslo))))
    {
        txt = "dobré heslo";
        document.getElementById("kontrolaHesla").style.color="orange";
    }
    if (((dlzka <=7) && (pismena.test(heslo)))
        || ((dlzka <=7) && obsahujeCislo)
        || ((dlzka <=6) && (pismena.test(heslo)) && obsahujeCislo)
        || ((dlzka <= 5) && (pismena.test(heslo)) && obsahujeCislo && (znaky.test(heslo))))
    {
        txt = "slabé heslo";
        document.getElementById("kontrolaHesla").style.color="red";
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
    } else {
        txt = "heslá sa nerovnajú";
        document.getElementById("rovnostHesla").style.color="red";
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


//-----------------------------------------------------------------------------


