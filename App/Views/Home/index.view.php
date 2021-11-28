
<?php /** @var Array $data */ ?>
<?php if ($data['warning'] != "") { ?>
    <div class="medzera"> </div>
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['warning'] ?>
    </div>
<?php } ?>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="semestralka/poledance.png" class="d-block w-100" alt="Pole Dance">
            <div class="carousel-caption d-none d-md-block">
                <h5>Pole Dance</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka/poledance.png" class="d-block w-100" alt="Aerial Hoop">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aerial Hoop</h5>
                <p>Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka/poledance.png" class="d-block w-100" alt="Aerial Silk">
            <div class="carousel-caption d-none d-md-block">
                <h5>Aerial Silk</h5>
                <p>Some representative placeholder content for the third slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="semestralka/poledance.png" class="d-block w-100" alt="Flexi">
            <div class="carousel-caption d-none d-md-block">
                <h5>Flexi</h5>
                <p>Some representative placeholder content for the second slide.</p>
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
        Fitness Academy je prvé pole dance štúdio v Žiline. <p>Jednotlivé kurzy prebiehajú pod vedením certifikovanej inštruktorky, členky Slovenskej Športovej Pole Dance Federácie, zaškolenej priamo zakladateľkou Pole Dance na SLOVENSKU.
        Okrem <a class="klikni" href=""?c=home&a=trenerky"">Pole Dance</a> u nás môžete nájsť aj kurzy <a class="klikni" href=""?c=home&a=trenerky"">Aerial Hoop</a>, <a class="klikni" href=""?c=home&a=trenerky"">Aerial Silk</a> či hodiny <a class="klikni" href=""?c=home&a=trenerky"">Flexi jógy</a>. <p>Taaktiež sa Vám snažíme pripravovať rôzne zaujímavé workshopy či akcie aby Vás hodiny u nás vo Fitness Academy bavili.
        Kladieme dôraz na zdravie a bezpečnosť, čiže súčasťou všetkých hodín Pole Dance je dôkladná rozcvička celého tela a tiež dbáme na čo najlepšie technické prevedenie jednotlivých prvkov.
    </p>
</div>