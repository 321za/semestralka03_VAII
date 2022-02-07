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
    <h4>NIEČO MÁLO</h4>
    <h1>O NÁS</h1>
    <h5>Fitness Acadamy</h5>
    <p>
        Fitness Academy je prvé pole dance štúdio v Žiline.
    <p>Jednotlivé kurzy prebiehajú pod vedením certifikovanej inštruktorky, členky Slovenskej Športovej Pole Dance
        Federácie, zaškolenej priamo zakladateľkou Pole Dance na SLOVENSKU.
        Okrem <a class="klikni" href=?c=home&a=poleDance>Pole Dance</a> u nás môžete nájsť aj kurzy <a class="klikni"
                                                                                                       href="?c=home&a=aerialHoop">Aerial
            Hoop</a>, <a class="klikni" href="?c=home&a=aerialSilk">Aerial Silk</a> či hodiny <a class="klikni"
                                                                                                 href="?c=home&a=flexiYoga">Flexi
            jógy</a>.
    <p>Taaktiež sa Vám snažíme pripravovať rôzne zaujímavé workshopy či akcie aby Vás hodiny u nás vo Fitness Academy
        bavili.
        Kladieme dôraz na zdravie a bezpečnosť, čiže súčasťou všetkých hodín Pole Dance je dôkladná rozcvička celého
        tela a tiež dbáme na čo najlepšie technické prevedenie jednotlivých prvkov.
    </p>
</div>

<div class="rozdelovac">Príďte si to vyskúšať na vlastnej koži.</div>

<div class="container">
    <h1>ČO O NÁS POVEDALI</h1>
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
                            class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block odoslatHodnotenie">Odoslať
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
                            onclick="uloz()">Upraviť
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>