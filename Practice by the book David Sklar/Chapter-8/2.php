<?php
/**
 * Напишите программу, отображающую форму с запросом блюд по их цене. После передачи
 * формы на обработку программа должна вывести наименования и цены тех блюд, которые
 * стоят не меньше, чем указано в форме. Не извлекайте из таблицы базы данных строки или
 * столбцы, которые не подлежат выводу на экран.
 */
require 'FormHelper.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    list($errors, $input) = validate_form();
    if($errors) {
        show_form($errors);
    } else {
        process_form($input);
    }
} else {
    show_form();
}

function show_form($errors = array()) {
    $form = new FormHelper();
    include 'complete-form-2.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    $input['price'] = trim($_POST['price'] ?? '');
    if (!is_numeric($input['price'])) {
        $errors[] = 'Please enter price.';
    }

    return array($errors, $input);
}

function process_form($input) {
    $price = $input['price'];
    try {
        $db = new PDO("pgsql:host=localhost;port=5432;dbname=restaurant;user=postgres;password=Wither757!");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $db->query("SELECT * FROM dishes WHERE price < $price ORDER BY price");
        while($row = $q->fetch()) {
            print "<div>$row[2] $row[1]\n</div>";
        }
    } catch (PDOException $e) {
        print "Соединение прошло не удачно:".$e->getMessage();
    }
}
?>