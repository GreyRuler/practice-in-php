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
    <?= $form->label("Введите своё имя:", ['for' => 'name']) ?>
    <?= $form->input('text', ['name' => 'name', 'id' => 'name']) ?>
    <br>
    <?= $form->label("Введите телефон:", ['for' => 'phone']) ?>
    <?= $form->input('tel', ['name' => 'phone', 'id' => 'phone']) ?>
    <br>
    <?= $form->select($GLOBALS['menu'], ['name' => 'menu']) ?>
    <?= $form->input('submit', ['name' => 'submit']) ?>
    
</form>