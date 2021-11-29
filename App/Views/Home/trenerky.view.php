<?php /** @var Array $data */ ?>
<div class="medzera"> </div>
<div class="container">
    <?php foreach ($data['trainers'] as $trainer) { ?>
    <div class="row align-items-center">
        <div class="col-12 col-md-5">
            <img src="<?= $trainer->getPhotoAddress() ?>">
        </div>
        <div class="col-12 col-md-1">
        <a href="?c=home&a=addStar&id=<?= $trainer->id ?>" class="btn btn-outline-warning" >
            <?= ($trainer->stars > 0 ? $trainer->stars : "") ?>
            <i id="starIcon" class="bi bi-star-fill"></i>
        </a>
        </div>
        <div class="col-12 col-md-6">
            <h5> <?= $trainer->getName() ?> </h5>
            <p> <?= $trainer->getText() ?> </p>
        </div>
    </div>
    <?php } ?>
</div>
