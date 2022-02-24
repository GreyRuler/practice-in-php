<?php
/**
 * Создайте новую таблицу для хранения информации о посетителе ресторана. В этой таблице
 * должна храниться следующая информация о каждом посетителе ресторана: идентификатор
 * посетителя, имя, номер телефона, а также идентификатор излюбленного блюда посетителя.
 * Напишите программу, отображающую форму для ввода нового посетителя в таблицу. Часть
 * формы, предназначенная для ввода излюбленного блюда посетителя, должна быть реализована
 * в виде списка наименований блюд, размечаемого дескриптором <select>. Идентификатор
 * посетителя должен формироваться вашей программой, а не вводиться в заполняемой форме.
 */
require 'FormHelper.php';

$menu = [];

try {
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=restaurant;user=postgres;password=Wither757!");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->query("SELECT * FROM dishes");
    while($row = $q->fetch()) {
        array_push($menu, $row['dish_name']);
    }
} catch (PDOException $e) {
    print "Соединение прошло не удачно:".$e->getMessage();
}



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
    include 'complete-form-4.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    $input['name'] = trim($_POST['name'] ?? '');
    $input['phone'] = trim($_POST['phone'] ?? '');
    $input['menu'] = trim($_POST['menu'] ?? '');

    return array($errors, $input);
}

function process_form($input) {
    global $db;
    $visitor_name = $input['name'];
    $visitor_phone = $input['phone'];
    $dish_id = $input['menu'];
    try {
        $stmt = $db->prepare('INSERT INTO visitors (visitor_name, visitor_phone, dish_id)
                              VALUES (?, ?, ?)');
        $stmt->execute(array($input['name'], $input['phone'], $input['menu']));
    } catch (Exception $e) {
        print "Couldn't insert a row: " . $e->getMessage();
    }
}
?>