<?php
/**
 * Напишите программу, отображающую, проверяющую достоверность и обрабатывающую форму
 * для ввода сведений о доставленной посылке. Эта форма должна содержать поля ввода адресов
 * отправителя и получателя, а также размеров и веса посылки. При проверке достоверности
 * данных из переданной на обработку формы должно быть установлено, что вес посылки не
 * превышает 150 фунтов (около 68 кг), а любой из ее размеров — 36 дюймов (порядка 91 см).
 * Можете также допустить, что в форме введены адреса США, но в таком случае проверьте
 * правильность ввода обозначения штата и почтового индекса. Функция обработки формы в
 * вашей программе должна выводить на экран сведения о посылке в виде организованного,
 * отформатированного отчета.
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
    include 'complete-form-4.php';
}

function validate_form() {
    $input = array();
    $errors = array();

    $input['sender'] = trim($_POST['sender'] ?? '');
    if (!strlen($input['sender'])) {
        $errors[] = 'Please enter the sender of the parcel.';
    }

    $input['recipient'] = trim($_POST['recipient'] ?? '');
    if (!strlen($input['recipient'])) {
        $errors[] = 'Please enter the recipient of the parcel.';
    }

    $input['weight'] = trim($_POST['weight'] ?? '');
    if (!strlen($input['weight'])) {
        $errors[] = 'Please enter the package weight';
    }

    if ($input['weight'] > 68) {
        $errors[] = 'The weight of the parcel should not exceed 68 kg';
    }

    $input['size'] = trim($_POST['size'] ?? '');
    if (!strlen($input['size'])) {
        $errors[] = 'Please enter the package size';
    }

    if ($input['size'] > 91) {
        $errors[] = 'The package size should not exceed 91 cm';
    }

    return array($errors, $input);
}

function process_form($input) {
    $message="ОТЧЁТ
    Отправитель | Получатель | Вес | Размер
    %11s | %10s | %3d | %6d
    ";
    echo nl2br(htmlentities(sprintf(($message), $input['sender'], $input['recipient'], $input['weight'], $input['size'])));
}
?>