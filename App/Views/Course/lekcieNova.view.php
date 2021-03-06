<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<div class="container">
    <h5>Pridať:</h5>
    <?php if (\App\Models\User::isAdministrator()) { ?>
        <form name="form4" method="post" action="?c=course&a=pridat">
            <label>Typ Kurzu:</label>
            <select id="typKurzu" name="typKurzu">
                <option value=1>Pole dance</option>
                <option value=2>Aerial Hoop</option>
                <option value=3>Aerial Silk</option>
                <option value=4>Flexi joga</option>
            </select>
            <div class="row">
                <div class="col-sm-6">
                    <div class="fcf-form-group">
                        <label class="form-label">Nazov</label>
                        <input type="text" class="fcf-form-control" name="caption" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="fcf-form-group">
                        <label for="exampleFormControlInput1" class="form-label">Info</label>
                        <input type="text" class="fcf-form-control" name="info" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="fcf-form-group">
                        <label class="form-label">Čas</label>
                        <input type="text" class="fcf-form-control" name="time" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="fcf-form-group">
                        <label class="form-label">Kapacita</label>
                        <input type="number" class="fcf-form-control" name="capacity" required>
                    </div>
                </div>
            </div>
            <div>
                <label>Vyber trenera :</label>
                <select id="trener" name="trener">
                    <?php foreach ($data['users'] as $users) { ?>
                    <?php if ($users->getType() == 1) { ?>
                            <option value=<?= $users->id ?>><?= $users->getEmail() ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Pridať</button>
            </div>
        </form>
    <?php } ?>
</div>