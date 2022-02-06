<div class="medzera"></div>

<div class="container">
    <div class="row">
        <h5>Pole dance</h5>
        <p>Je moderná forma cvičenia, ktorá má korene v INDII. Tradičný indický šport mallakhamb využíval princípy sily a vytrvalosti pomocou dreveného kôlu.<br> Súčasný Pole Dance spája prvky pilatesu, jógy, baletu, akrobacie, gymnastiky a voľného tanca na statických alebo rotačných tyčiach. Táto tanečná disciplína rysuje a spevňuje celé telo pomocou váhy vlastného tela.
        <p>Pole Dance si získava stále vačšiu obľubu nielen u žien, ale aj u mužov. Nemá žiadne vekové ani váhové obmedzenia. Svaly sa precvičujú a zosilňujú postupne, preto akékoľvek obavy nie sú na mieste. Dôležitá je vytrvalosť a tréning. Zaručeným výsledkom je nielen spevnená a tvarovaná postava, precvičenie každého svalu na tele, ale aj maximálne nabitie sa pozitívnou energiou, zvýšenie sebavedomia, neustále prekračovanie vlastných hraníc, radosť z nepoznaných schopností vlastného tela, chuť a motivácia k väčšej starostlivosti o telo a zdravie.<br></p>
        <p class="cena">Cena skúšobnej hodiny: 6€<br>Cena za kurz: 72€/10h</p>
        <?php if (\App\Models\User::isLogged()) {?>
        <?php if (\App\Models\User::isUser()) {?>
        <div class="mb-3">
            <a href="?c=course&a=lekciePoleDance" >
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
            <img src="semestralka03/PDclass03.jpg" alt="obrazok">
        </div>
        <div class="col-6 col-sm-4">
            <img src="semestralka03/PDclass06.jpg" alt="obrazok">
        </div>
        <div class="col col-sm-4">
            <img src="semestralka03/PDclass08.jpg" alt="obrazok">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <img src="semestralka03/PDclass01.jpg" alt="obrazok">
        </div>
        <div class="col-12 col-sm-6">
            <img src="semestralka03/PDclass02.jpg" alt="obrazok">
        </div>
    </div>
</div>