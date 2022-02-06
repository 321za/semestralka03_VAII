<?php /** @var Array $data */ ?>
<div class="medzera"></div>

<div class="container">
    <h5>Úprava:</h5>
    <?php if (\App\Models\User::isLogged()) {?>
    <?php if (!\App\Models\User::isUser()) {?>

            <form name="form4" method="post" action="?c=course&a=ulozitZmeny">
                <input type="hidden" name="id" value="<?= @$data['id']?>">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="fcf-form-group">
                            <label class="form-label">Nazov</label>
                            <input type="text" value="<?= @$data['caption']?>" class="fcf-form-control" name="caption" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fcf-form-group">
                            <label for="exampleFormControlInput1" class="form-label">Info</label>
                            <input type="text" value="<?= @$data['info']?>" class="fcf-form-control" name="info" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="fcf-form-group">
                            <label class="form-label">Čas</label>
                            <input type="text" value="<?= @$data['time']?>" class="fcf-form-control" name="time" required>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="fcf-form-group">
                            <label class="form-label">Kapacita</label>
                            <input type="number" value="<?= @$data['capacity']?>" class="fcf-form-control" name="capacity" required>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                        <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Uložiť zmeny</button>
                </div>
            </form>
    <?php } ?>
    <?php } ?>
</div>
