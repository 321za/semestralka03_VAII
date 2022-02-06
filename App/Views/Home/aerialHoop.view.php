<div class="medzera"></div>

<div class="container">
    <div class="row">
        <h5>Aerial Hoop</h5>
        <p>Počiatky Aerial Hoop siahajú až do 18. storočia, kedy sa využíval skôr ako zábava pre deti. Akrobaciu na kruhu ako ju poznáme dnes preslávil až Cirque de Soleil v predstavení Varekai v roku 2002.<br> Vzdušná akrobacia na obruči, alebo kruhu spája v sebe silu, eleganciu a flexibilitu. Posilňuje celé telo, najmä však vrch a strednú časť, zlepšuje rovnováhu, rozsah a ladnosť pohybu.
        <p> Zaručeným výsledkom je nielen spevnená a tvarovaná postava, precvičenie každého svalu na tele, ale aj maximálne nabitie sa pozitívnou energiou, zvýšenie sebavedomia, neustále prekračovanie vlastných hraníc, radosť z nepoznaných schopností vlastného tela, chuť a motivácia k väčšej starostlivosti o telo a zdravie.</p>
        <p class="cena">Cena skúšobnej hodiny: 6€<br>Cena za kurz: 72€/10h</p>
            <?php if (\App\Models\User::isLogged()) {?>
                <?php if (\App\Models\User::isUser()) {?>
                    <div class="mb-3">
                        <a href="?c=course&a=lekcieAerialHoop" >
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
            <img src="semestralka03/AHclass03.jpg" alt="obrazok">
        </div>
        <div class="col-6 col-sm-4">
            <img src="semestralka03/AHclass04.jpg" alt="obrazok">
        </div>
        <div class="col col-sm-4">
            <img src="semestralka03/AHclass10.jpg" alt="obrazok">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-6">
            <img src="semestralka03/AHclass14.jpg" alt="obrazok">
        </div>
        <div class="col-12 col-sm-6">
            <img src="semestralka03/AHclass13.jpg" alt="obrazok">
        </div>
    </div>
</div>
</div>