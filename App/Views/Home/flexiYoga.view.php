<div class="medzera"></div>

<div class="container">
    <div class="row">
        <h5>Flexi Yoga</h5>
        <p>Zdravo a funkčne posúva a buduje väčšiu flexibilitu tela.<br>
        <p>Flexi yoga je nenáročná forma yogy, vhodná pre začiatočníkov a pokročilých, pre športovcov ako forma strečingu, ale aj pre tých, ktorých trápi sedavé zamestnanie. Jemné ťahy svalov, práca s dychom uľavujúca nielen v zatuhnutých častiach tela, relaxácia a pomalšie tempo prinesú uvoľnenie pri každodenných pohyboch (hlboký predklon, vystretie končatín, rotácia chrbta, otváranie panvy) a pomôžu obnoviť pohyb v žiaducich partiách.</p>
        <p class="cena">Cena skúšobnej hodiny: 4€<br>Cena za kurz: 50€/10h</p>
        <?php if (\App\Models\User::isLogged()) {?>
            <?php if (\App\Models\User::isUser()) {?>
                <div class="mb-3">
                    <a href="?c=course&a=lekcieFlexiJoga" >
                        <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Chcem si vyskúšať</button>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
        <?php if (!\App\Models\User::isLogged()) {?>
            <div class="mb-3">
                <a href="?c=Auth&a=loginForm">
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Chcem si vyskúšať</button>
                </a>
            </div>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-6 col-sm-4 ">
            <img src="semestralka03/FYclass01.jpg" alt="obrazok">
        </div>
        <div class="col-6 col-sm-4">
            <img src="semestralka03/FYclass06.jpg" alt="obrazok">
        </div>
        <div class="col col-sm-4">
            <img src="semestralka03/FYclass03.jpg" alt="obrazok">
            <img src="semestralka03/FYclass02.jpg" alt="obrazok">

        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <img src="semestralka03/FYclass04.jpg" alt="obrazok">
        </div>
        <div class="col-12 col-sm-6">
            <img src="semestralka03/FYclass05.jpg" alt="obrazok">
        </div>
    </div>
</div>
</div>