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

    <?= $form->label("Адрес отправителя:", ['for' => 'sender']) ?>
    <?= $form->input('text', ['id' => 'sender', 'name' => 'sender']) ?>
    <br/>
    <?= $form->label("Адрес получателя:", ['for' => 'recipient']) ?>
    <?= $form->input('text', ['id' => 'recipient', 'name' => 'recipient']) ?>
    <br/>
    <?= $form->label("Вес посылки:", ['for' => 'weight']) ?>
    <?= $form->input('text', ['id' => 'weight', 'name' => 'weight']) ?>
    <br/>
    <?= $form->label("Размеры посылки:", ['for' => 'size']) ?>
    <?= $form->input('text', ['id' => 'size', 'name' => 'size']) ?>
    <br/>

    <br/>
    <?= $form->input('submit', ['name' => 'submit']) ?>
    
</form>