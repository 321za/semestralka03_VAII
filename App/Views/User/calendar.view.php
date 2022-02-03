<?php /** @var Array $data */ ?>
<div class="medzera"> </div>
<?php if ($data['warning'] != "") { ?>
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['warning'] ?>
    </div>
<?php } ?>

<div class="container">
    <h5>Tvoje naplánované lekcie:</h5>
    <?php if (\App\Models\User::isLogged()) {?>
        <?php if (!\App\Models\User::isTrainer()) {?>
            <?php foreach ($data['courses'] as $courses) { ?>
                <table id="tableCourses" class="tableCourses">
                    <tbody id="tableBody">
                    <tr>
                        <td idCaption="<?= $courses->getCaption() ?>">
                            <h5  ><?= $courses->getCaption() ?></h5>
                        </td>
                        <td >
                            <p idInfo="<?= $courses->getInfo() ?>"><?= $courses->getInfo() ?></p>
                        </td>
                        <td>
                            <p idTime="<?= $courses->getTime() ?>"> <?= $courses->getTime() ?> </p>
                        </td>
                        <td>
                            <a href="?c=course&a=delete&id=<?= $courses->id ?>">
                                <button type="submit" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Odhlásiť sa</button>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</div>



