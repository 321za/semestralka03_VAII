<?php /** @var Array $data */ ?>
<div class="medzera"> </div>
<div class="container">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <h5>Registrácia</h5>
            <br>
            <?php if ($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <form name="form1" method="post" action="?c=auth&a=registration">
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" value="<?= @$data['login']?>" class="fcf-form-control" name="login" id="emailValid" onchange="validateEmail()" required>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput2" class="form-label">Heslo</label>
                    <input type="password"  class="hesla" name="password" id="exampleFormControlInput2" onkeyup="checkPassword(document.form1.password)" required>
                    <p id="kontrolaHesla"></p>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput3" class="form-label">Heslo znovu</label>
                    <input type="password" class="hesla" name="passwordAgain" id="exampleFormControlInput3" onkeyup="equalPassword(document.form1.passwordAgain, document.form1.password)" required>
                    <p id="rovnostHesla"></p>
                </div>
                <div class="mb-3">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Zaregistrovať</button>
                </div>
            </form>
        </div>
    </div>
</div>