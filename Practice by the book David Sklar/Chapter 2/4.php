<?php
/**
 * Напишите на РНР программу, задающую имя в переменной $first_name и фамилию в 
 * переменной $last_name. Выведите символьную строку, содержащую имя и фамилию, разделив
 * их пробелом. Кроме того, выведите длину этой символьной строки.
 */
$first_name = 'Имя';
$last_name = "Фамилия";
echo mb_strlen($first_name.$last_name, 'utf-8');
?>