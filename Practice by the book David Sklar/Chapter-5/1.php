<?php
/**
 * Напишите функцию, возвращающую дескриптор <img /> разметки HTML-страницы. Эта
 * функция должна принимать URL изображения в качестве обязательного аргумента, а так-
 * же текст надписи, ширину и высоту изображения в качестве необязательных аргументов alt,
 * height и width соответственно.
 */
function return_img($url, $alt=null, $height=null, $width=null) {
    $img = "<img src=$url";
    if (isset($alt)) {
        $img .= " alt=$alt";
    }
    if (isset($height)) {
        $img .= " height=$height";
    }
    if (isset($width)) {
        $img .= " width=$width";
    }
    $img .= ">";
    return $img;
}
print return_img("https://www.sunhome.ru/i/wallpapers/163/alberta-banf-kanada.1920x1200.jpg", "img", 100, 100)
?>