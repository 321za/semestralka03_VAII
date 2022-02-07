<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<?php if ($data['warning'] != "") { ?>
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['warning'] ?>
    </div>
<?php } ?>

<div class="container">
    <h5>Vyskúšajte si niečo z naších lekcií:</h5>
    <?php if (\App\Models\User::isLogged()) { ?>

        <?php if (\App\Models\User::isTrainer()) { ?>
            <?php foreach ($data['courses'] as $courses) { ?>
                <table id="tableCourses" class="tableCourses">
                    <tbody id="tableBody">
                    <tr>
                        <td idCaption="<?= $courses->getCaption() ?>">
                            <h5><?= $courses->getCaption() ?></h5>
                        </td>
                        <td>
                            <p idInfo="<?= $courses->getInfo() ?>"><?= $courses->getInfo() ?></p>
                        </td>
                        <td>
                            <p idTime="<?= $courses->getTime() ?>"> <?= $courses->getTime() ?> </p>
                        </td>
                        <td>
                            <p idCapacity="<?= $courses->getCapacity() ?>"> <?= $courses->getCapacity() ?> </p>
                        </td>
                        <td>
                            <a>
                                <button id="uprava" type="button"
                                        class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block editButton"
                                        dataId="<?php echo $courses->getId() ?>" data-bs-toggle="modal"
                                        data-bs-target="#myModal">Upraviť
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="?c=course&a=delete&id=<?= $courses->id ?>">
                                <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">
                                    Odstrániť
                                </button>
                            </a>
                        </td>
                    </tr>

                    </tbody>
                </table>
                ]
            <?php } ?>
            <a href="?c=course&a=lekcieNova">
                <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block"> Pridať novú lekciu
                </button>
            </a>


            <div class="modal fade" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form name="form5" method="post">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="fcf-form-group">
                                        <label class="form-label">Nazov</label>
                                        <input type="text" class="fcf-form-control" id="caption" name="caption"
                                               required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fcf-form-groupM">
                                        <label for="exampleFormControlInput1" class="form-label">Info</label>
                                        <input type="text" class="fcf-form-control" id="info" name="info" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fcf-form-groupM">
                                        <label class="form-label">Čas</label>
                                        <input type="text" class="fcf-form-control" id="time" name="time" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fcf-form-groupM">
                                        <label class="form-label">Kapacita</label>
                                        <input type="number" class="fcf-form-control" id="capacity" name="capacity"
                                               required>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <a href='#' id="save">
                                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">
                                        Uložiť zmeny
                                    </button>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php if (!\App\Models\User::isTrainer()) { ?>
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
                            <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Prihlásiť
                                sa
                            </button>
                        </a>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>


