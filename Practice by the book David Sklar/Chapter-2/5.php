<?php
/**
 * Напишите на РНР программу, в которой применяются составные операции инкрементирования
 * (++) и умножения с присваиванием (*=), для вывода чисел в пределах от 1 до 5, а также
 * степеней числа 2 в пределах от 2 (2^1) до 32 (2^5).
 */
$number = 2;
$count = 1;
print $number**$count++;
print $number**$count++;
print $number**$count++;
print $number**$count++;
print $number**$count++;
?>