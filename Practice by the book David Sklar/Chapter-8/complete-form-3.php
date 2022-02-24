<form method="POST" action="<?= $form->encode($_SERVER['PHP_SELF']) ?>">
    <?php if ($errors) { ?>
    <tr>
        <td>You need to correct the following errors:</td>
        <td><ul>
            <?php foreach ($errors as $error) { ?>
                <li><?= $form->encode($error) ?></li>
            <?php } ?>
        </ul></td>
    <?php } ?>
    <?= $form->select($GLOBALS['menu'], ['name' => 'menu']) ?>
    <?= $form->input('submit', ['name' => 'submit']) ?>
</form>