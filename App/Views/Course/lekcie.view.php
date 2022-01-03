<?php /** @var Array $data */ ?>
<div class="medzera"></div>

<div class="container">
    <h5>Vyskúšajte si niečo z naších lekcií:</h5>
    <?php if (\App\Models\User::isLogged()) {?>

    <?php if (\App\Models\User::isTrainer()) {?>
            <?php foreach ($data['courses'] as $courses) { ?>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <h5><?= $courses->getCaption() ?> </h5>
                        <p><?= $courses->getInfo() ?></p>
                    </div>
                    <div class="col-12 col-md-3">
                        <p> <?= $courses->getTime() ?> </p>
                    </div>
                    <div class="col-12 col-md-3">
                        <p> <?= $courses->getCapacity() ?> </p>
                    </div>
                    <div class="col-12 col-md-2">
                <a href="?c=course&a=delete&id=<?= $courses->id ?>">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Odstrániť</button>
                </a>
                <a href="?c=course&a=update&id=<?= $courses->id ?>">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block"> Upraviť </button>
                </a>
            </div>
        </div>
    <?php } ?>
            <a href="?c=course&a=lekcieNova">
                <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block"> Pridať novú lekciu</button>
            </a>
    <?php } ?>

    <?php if (!\App\Models\User::isTrainer()) {?>
            <?php foreach ($data['courses'] as $courses) { ?>
                <div class="row align-items-center">
                    <div class="col-12 col-md-4">
                        <h5><?= $courses->getCaption() ?> </h5>
                        <p><?= $courses->getInfo() ?></p>
                    </div>
                    <div class="col-12 col-md-3">
                        <p> <?= $courses->getTime() ?> </p>
                    </div>
                    <div class="col-12 col-md-3">
                        <p> <?= $courses->getCapacity() ?> </p>
                    </div>
                <div class="col-12 col-md-2">
                    <a href="?c=course&a=decreaseCapacity&id=<?= $courses->id ?>">
                        <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Prihlásiť sa</button>
                    </a>
                </div>
            </div>
        <?php } ?>
    <?php } ?>
    <?php } ?>
</div>


