<?php /** @var Array $data */ ?>
<?php if ($data['warning'] != "") { ?>
    <div class="medzera"></div>
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['warning'] ?>
    </div>
<?php } ?>


<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="semestralka03/poledance.png" class="d-block w-100" alt="Pole Dance">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pole Dance</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka03/aerialHoop066.png" class="d-block w-100" alt="Aerial Hoop">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aerial Hoop</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka03/aerialSilk05.jpg" class="d-block w-100" alt="Aerial Silk">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aerial Silk</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka03/flexi08.jpg" class="d-block w-100" alt="Flexi">
            <div class="carousel-caption d-none d-md-block">
                <h5>Flexi</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container">
    <h4>NIE??O M??LO</h4>
    <h1>O N??S</h1>
    <h5>Fitness Acadamy</h5>
    <p>
        Fitness Academy je prv?? pole dance ??t??dio v ??iline.
    <p>Jednotliv?? kurzy prebiehaj?? pod veden??m certifikovanej in??truktorky, ??lenky Slovenskej ??portovej Pole Dance
        Feder??cie, za??kolenej priamo zakladate??kou Pole Dance na SLOVENSKU.
        Okrem <a class="klikni" href=?c=home&a=poleDance>Pole Dance</a> u n??s m????ete n??js?? aj kurzy <a class="klikni"
                                                                                                       href="?c=home&a=aerialHoop">Aerial
            Hoop</a>, <a class="klikni" href="?c=home&a=aerialSilk">Aerial Silk</a> ??i hodiny <a class="klikni"
                                                                                                 href="?c=home&a=flexiYoga">Flexi
            j??gy</a>.
    <p>Taaktie?? sa V??m sna????me pripravova?? r??zne zauj??mav?? workshopy ??i akcie aby V??s hodiny u n??s vo Fitness Academy
        bavili.
        Kladieme d??raz na zdravie a bezpe??nos??, ??i??e s????as??ou v??etk??ch hod??n Pole Dance je d??kladn?? rozcvi??ka cel??ho
        tela a tie?? db??me na ??o najlep??ie technick?? prevedenie jednotliv??ch prvkov.
    </p>
</div>

<div class="rozdelovac">Pr????te si to vysk????a?? na vlastnej ko??i.</div>

<div class="container">
    <h1>??O O N??S POVEDALI</h1>
    <div style="overflow-x: auto;">
        <table id="tableReview" class="tableReview">
            <tbody id="tableBody">
            <?php foreach ($data['reviews'] as $reviews) { ?>

                <tr>
                    <td>
                        <h5><?= $reviews->getAuthor() ?> </h5>
                    </td>
                    <td class="textR">
                        <p id="tr<?php echo $reviews->getId() ?>"> <?= $reviews->getText() ?> </p>
                    </td>
                    <?php if (\App\Models\User::isLogged()) { ?>
                        <?php if (\App\Models\User::isAdministrator()) { ?>
                            <td>
                                <button class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block delBut"
                                        dataId="<?php echo $reviews->getId() ?>">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </td>
                        <?php } ?>
                        <?php if (\App\Models\User::isUser()) { ?>
                            <?php if ($reviews->getEmail() === $_SESSION['login']) { ?>
                                <td>
                                    <button class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block delBut"
                                            dataId="<?php echo $reviews->getId() ?>">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </td>
                                <td>
                                    <button class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block editBut"
                                            dataId="<?php echo $reviews->getId() ?>" text="<?= $reviews->getText() ?>"
                                            data-bs-toggle="modal" data-bs-target="#myModalEdit">
                                        <i class="bi bi-vector-pen"></i>
                                    </button>
                                </td>
                            <?php } ?>
                            <?php if ($reviews->getEmail() != $_SESSION['login']) { ?>
                                <td>
                                </td>
                                <td>
                                </td>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>


    <?php if (\App\Models\User::isLogged()) { ?>
        <?php if (\App\Models\User::isUser()) { ?>
            <div>
                <button id="recenziaPridat" name="recenziaPridat" type="button"
                        class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block" data-bs-toggle="modal"
                        data-bs-target="#myModal">Pridat recenziu
                </button>
            </div>
        <?php } ?>
    <?php } ?>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="fcf-form-group">
                        <label>Hodnotenie:</label>
                        <textarea id="text" class="fcf-form-control text" name="text" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="odoslatHodnotenie"
                            class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block odoslatHodnotenie">Odosla??
                        hodnotenie
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModalEdit">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="fcf-form-group">
                        <label>Hodnotenie:</label>
                        <input type="hidden" id="hiddenID" name="hiddenID">
                        <textarea id="textE" class="fcf-form-control textE" name="textE" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="upravitHodnotenie" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block"
                            onclick="uloz()">Upravi??
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>