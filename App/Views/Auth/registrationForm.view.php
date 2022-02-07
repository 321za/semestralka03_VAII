<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-4">
            <h5>Registrácia</h5>
            <br>
            <?php if ($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <form name="form1" method="post" action="?c=auth&a=registration">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="fcf-form-group">
                            <label for="exampleFormControlInput1" class="form-label">Meno</label>
                            <input type="text" value="<?= @$data['name'] ?>" class="fcf-form-control" name="name"
                                   id="nameValid" onchange="validateName()" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fcf-form-group">
                            <label for="exampleFormControlInput1" class="form-label">Priezvisko</label>
                            <input type="text" value="<?= @$data['surname'] ?>" class="fcf-form-control" name="surname"
                                   id="surnameValid" onchange="validateSurname()" required>
                        </div>
                    </div>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" value="<?= @$data['login'] ?>" class="fcf-form-control" name="login"
                           id="emailValid" onchange="validateEmail()" required>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput2" class="form-label">Heslo</label>
                    <input type="password" class="hesla" name="password"
                           onkeyup="checkPassword(document.form1.password)" required>
                    <p id="kontrolaHesla"></p>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput3" class="form-label">Heslo znovu</label>
                    <input type="password" class="hesla" name="passwordAgain"
                           onkeyup="equalPassword(document.form1.passwordAgain, document.form1.password)" required>
                    <p id="rovnostHesla"></p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Zaregistrovať
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>