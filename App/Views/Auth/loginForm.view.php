<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<div class="container">
    <div class="row">
        <div class="col-sm-5 offset-sm-4">
            <h5>Prihlásenie</h5>
            <br>
            <?php if ($data['error'] != "") { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    <?= $data['error'] ?>
                </div>
            <?php } ?>
            <form id="LoginForm" method="post" action="?c=auth&a=login">
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" value="<?= @$data['login'] ?>" class="fcf-form-control" name="login" id="login"
                           required>
                </div>
                <div class="fcf-form-group">
                    <label for="exampleFormControlInput2" class="form-label">Heslo</label>
                    <input type="password" class="fcf-form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block" value
                    "Login">Prihlásiť</button>
                </div>
                <div>
                    <a href="?c=Auth&a=registrationForm" class="register">Vytvoriť nový účet</a>
                </div>
            </form>
        </div>
    </div>
</div>