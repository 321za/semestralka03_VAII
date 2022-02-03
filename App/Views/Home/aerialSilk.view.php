<div class="medzera"></div>

<div class="container">
    <div class="row">
        <h5>Aerial Silk</h5>
        <p>“Vzdušná akrobacia alebo tzv. lietanie bez krídel je jedinečné cvičenie v ktorom sa spája sila športu a kreativita umenia” <br>
        <p>V rámci tréningu posilňujete svoje svalstvo, trénujete flexibilitu a učíte sa nové akrobatické prvky vo vzduchu. Jedinečnosťou naších kurzov je, že sa nenaučíte len konrétne prvky, ale pripravíme Vám choreografiu šitú presne na mieru, vytvorenú z kombinácie viacerých prvkov a spojenú plynulými prechodmi do ucelenej choreografie s hudbou. Choreografie a hodiny sú prispôsobené každému klientovi podľa jeho zručností a znalostí.<br></p>
        <p class="cena">Cena skúšobnej hodiny: 5€<br>Cena za kurz: 65€/10h</p>
        <?php if (\App\Models\User::isLogged()) {?>
        <?php if (!\App\Models\User::isTrainer()) {?>
        <div class="mb-3">
            <div class="mb-3">
                <a href="?c=course&a=lekcieAerialSilk" >
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