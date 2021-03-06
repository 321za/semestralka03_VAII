<?php /** @var Array $data */ ?>
<div class="medzera"></div>
<div class="container">
    <h5>Zoznam všetkých používateľov:</h5>
    <?php if (\App\Models\User::isLogged()) { ?>
    <table>
        <tbody>
        <?php if (\App\Models\User::isAdministrator()) { ?>
            <tr>
                <th>Email</th>
                <th>Nastaviť rolu na:</th>
            </tr>
            <?php foreach ($data['users'] as $users) { ?>
                <tr>
                    <td>
                        <p><?= $users->getEmail() ?></p>
                    </td>
                    <?php if ($users->getType() == 0) { ?>
                        <td>
                            <a href="?c=user&a=setTrener&id=<?= $users->id ?>">
                                <button type="button"
                                        class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block adminBut">Tréner
                                </button>
                            </a>
                        </td>
                    <?php } ?>
                    <?php if ($users->getType() == 1) { ?>
                        <td>
                            <a href="?c=user&a=setNavstevnik&id=<?= $users->id ?>">
                                <button class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block adminBut">
                                    Návštevník
                                </button>
                            </a>
                        </td>
                    <?php } ?>
                    <?php if ($users->getType() == 2) { ?>
                        <td>
                        </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>
