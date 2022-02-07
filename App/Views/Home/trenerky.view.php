<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<div class="container">
    <?php foreach ($data['trainers'] as $trainer) { ?>
        <div class="row align-items-center">
            <div class="col-12 col-md-5">
                <img src="<?= $trainer->getPhotoAddress() ?>" alt="FotkaTrenerky">
            </div>
            <div class="col-12 col-md-1">
                <?php if (\App\Models\User::isLogged()) { ?>
            <?php if (\App\Models\User::isUser()) { ?>
                <a href="?c=home&a=addStar&id=<?= $trainer->id ?>" class="btn btn-outline-warning">
                    <?php } ?>
                    <?php } ?>
                    <?= ($trainer->stars > 0 ? $trainer->stars : "") ?>
                    <i class="bi bi-star-fill"></i>
                    <?php if (\App\Models\User::isLogged()) { ?>
                    <?php if (\App\Models\User::isUser()) { ?>
                </a>
            <?php } ?>
            <?php } ?>

            </div>
            <div class="col-12 col-md-6">
                <h5> <?= $trainer->getName() ?> </h5>
                <p> <?= $trainer->getText() ?> </p>
            </div>
        </div>
    <?php } ?>
</div>
