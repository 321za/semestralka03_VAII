<?php /** @var Array $data */ ?>
<div class="medzera"> </div>
<div class="container">
    <?php foreach ($data['trainers'] as $trainer) { ?>
    <div class="row align-items-center">
        <div class="col-12 col-md-5">
            <img src="<?= $trainer->getPhotoAddress() ?>">
        </div>
        <div class="col-12 col-md-1">
        <a href="?c=home&a=addstar&idecko=<?= $trainer->id ?>" class="btn btn-primary">
            <?= ($trainer->stars > 0 ? $trainer->stars : "") ?>
            <i class="bi bi-star-fill"></i>
        </a>
        </div>
        <div class="col-12 col-md-6">
            <h5> <?= $trainer->getName() ?> </h5>
            <p> <?= $trainer->getText() ?> </p>
        </div>
    </div>
    <?php } ?>
</div>
