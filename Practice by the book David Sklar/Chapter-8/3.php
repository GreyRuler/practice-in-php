<?php
/**
 * Напишите программу, отображающую форму со списком наименований блюд, размечаемым
 * дескриптором <select>. Составьте такой список из наименований блюд, извлеченных из базы
 * данных. После передачи формы на обработку программа должна вывести из таблицы всю
 * информацию о выбранном блюде, в том числе идентификатор, наименование, цену и наличие
 * специй в данном блюде.
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
    include 'complete-form-3.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    $input['menu'] = trim($_POST['menu'] ?? '');

    return array($errors, $input);
}

function process_form($input) {
    global $db;
    $dish_id = $input['menu'];
    if (isset($_POST['menu'])) {
        $q = $db->query("SELECT * FROM dishes WHERE dish_id = $dish_id + 1");
        
        while($row = $q->fetch()) {
            printf("
                    DISH_ID | DISH_NAME | PRICE | IS_SPICY<br>
                    $row[0] $row[1] $row[2] $row[3]
                    ");
        }
    }
}
?>