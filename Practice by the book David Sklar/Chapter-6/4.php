<?php
/**
 * Разместите свой класс Ingredient в собственном пространстве имен и внесите изменения в
 * другой код, где применяется класс Ingredient, чтобы этот код функционировал надлежащим
 * образом.
 */
require_once("2.php");
require_once("1.php");
use Tiny\Ingredient;

$apple = new Ingredient("Яблоко", 40);
print $apple->getPrice();
?>