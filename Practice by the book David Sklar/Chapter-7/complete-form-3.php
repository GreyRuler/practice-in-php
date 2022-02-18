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

    <?= $form->label("Введите первое число:", ['for' => 'number-one']) ?>
    <?= $form->input('text', ['id' => 'number-one', 'name' => 'number-one']) ?>
    <br/>
    <?= $form->label("Введите второе число:", ['for' => 'number-two']) ?>
    <?= $form->input('text', ['id' => 'number-two', 'name' => 'number-two']) ?>
    <br/>
    <?= $form->select($GLOBALS['operation'], ['name' => 'operation']) ?>

    <br/>
    <?= $form->input('submit', ['name' => 'submit']) ?>
    
</form>