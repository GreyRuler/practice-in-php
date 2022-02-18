<?php
/**
 * Напишите программу, выполняющую основные арифметические операции. С этой целью
 * отобразите форму с текстовым полем для ввода двух операндов и список, размечаемых
 * дескриптором <select>, для выбора операции сложения, вычитания, умножения или деления.
 * Организуйте проверку достоверности вводимых данных, чтобы они были числовыми и пригодными
 * для выполнения выбранной арифметической операции. Функция обработки вводимых данных
 * должна отображать операнды, операцию и результат ее выполнения. Так, если введены
 * операнды 4 и 2 и выбрана операция умножения, то функция обработки вводимых данных должна
 * отобразить следующее: 4*2 = 8.
 */

require 'FormHelper.php';

$operation = ['summation' => 'Сложение',
              'subtraction' => 'Вычитание',
              'multiplication' => 'Умножение',
              'division' => 'Деление'];

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

    $input['number-one'] = trim($_POST['number-one'] ?? '');
    if (!is_numeric($input['number-one'])) {
        $errors[] = 'Please enter the first number.';
    }

    $input['number-two'] = trim($_POST['number-two'] ?? '');
    if (!is_numeric($input['number-two'])) {
        $errors[] = 'Please enter the second number.';
    }

    $input['number-two'] = trim($_POST['number-two'] ?? '');
    if ($input['number-two'] == 0) {
        $errors[] = 'Деление на 0';
    }

    return array($errors, $input);
}

function process_form() {
    $answer = calculate();
    print "Ответ: $answer";
}

function operation_summation($x, $y) {
    return $x + $y;
}

function operation_subtraction($x, $y) {
    return $x - $y;
}

function operation_multiplication($x, $y) {
    return $x * $y;
}

function operation_division($x, $y) {
    if ($y == 0) {
        return "Деление на 0";
    } else {
        return $x / $y;
    }    
}

function calculate() {
    if (isset($_POST['operation'])) {
        $number_one = $_POST['number-one'];
        $number_two = $_POST['number-two'];
        $operation = $_POST['operation'];
        if ($operation == "summation") {
            return operation_summation($number_one, $number_two);
        } elseif ($operation == "subtraction") {
            return operation_subtraction($number_one, $number_two);
        } elseif ($operation == "multiplication") {
            return operation_multiplication($number_one, $number_two);
        } elseif ($operation == "division") {
            return operation_division($number_one, $number_two);
        }
    }
}
?>