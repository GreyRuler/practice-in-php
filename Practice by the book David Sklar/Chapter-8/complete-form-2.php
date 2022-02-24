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
    <?= $form->label("Введите цену:", ['for' => 'price']) ?>
    <?= $form->input('text', ['id' => 'price', 'name' => 'price']) ?>
    <?= $form->input('submit', ['name' => 'submit']) ?>
</form>