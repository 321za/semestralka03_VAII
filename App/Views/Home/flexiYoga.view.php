<div class="medzera"></div>

<div class="container">
    <div class="row">
        <h5>Flexi Yoga</h5>
        <p>Zdravo a funkčne posúva a buduje väčšiu flexibilitu tela.<br>
        <p>Flexi yoga je nenáročná forma yogy, vhodná pre začiatočníkov a pokročilých, pre športovcov ako forma strečingu, ale aj pre tých, ktorých trápi sedavé zamestnanie. Jemné ťahy svalov, práca s dychom uľavujúca nielen v zatuhnutých častiach tela, relaxácia a pomalšie tempo prinesú uvoľnenie pri každodenných pohyboch (hlboký predklon, vystretie končatín, rotácia chrbta, otváranie panvy) a pomôžu obnoviť pohyb v žiaducich partiách.</p>
        <p class="cena">Cena skúšobnej hodiny: 4€<br>Cena za kurz: 50€/10h</p>
        <?php if (\App\Models\User::isLogged()) {?>
        <?php if (!\App\Models\User::isTrainer()) {?>
        <div class="mb-3">
            <div class="mb-3">
                <a href="?c=course&a=lekcieFlexiJoga" >
                    <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Chcem si vyskúšať</button>
                </a>
            </div>
            <?php }?>
        <?php } ?>
    </div>
    <div class="row">
        <div class="col-6 col-sm-4 ">
            <img src="obrazok2.png" alt="obrazok">
        </div>
        <div class="col-6 col-sm-4">
            <img src="obrazok2.png" alt="obrazok">
        </div>
        <div class="col col-sm-4">
            <img src="obrazok2.png" alt="obrazok">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <img src="obrazok1.png" alt="obrazok">
        </div>
        <div class="col-12 col-sm-6">
            <img src="obrazok1.png" alt="obrazok">
        </div>
    </div>
</div>