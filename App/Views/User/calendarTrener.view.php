<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<?php if ($data['warning'] != "") { ?>
    <div class="alert alert-secondary alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <?= $data['warning'] ?>
    </div>
<?php } ?>
<div class="container">
    <h5>Administrátor ti pridelil tieto lekcie:</h5>
    <?php if (\App\Models\User::isLogged()) { ?>
        <?php if (\App\Models\User::isTrainer()) { ?>
            <table id="tableCourses" class="tableCourses">
                <tbody id="tableBody">
                <?php foreach ($data['courses'] as $courses) { ?>
                    <tr>
                        <td>
                            <h5 class="nazovTypu"><?= $courses->getNazovTypu() ?> </h5>
                        </td>
                        <td>
                            <h5><?= $courses->getCaption() ?></h5>
                        </td>
                        <td>
                            <p><?= $courses->getInfo() ?></p>
                        </td>
                        <td>
                            <p> <?= $courses->getTime() ?> </p>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } ?>
    <?php } ?>
</div>



