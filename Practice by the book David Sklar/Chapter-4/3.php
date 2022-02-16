<?php
/**
 * Выясните, как хранить каждый из приведенных ниже видов информации в массиве, а за-
 * тем предоставьте пример кода, в котором создается такой массив, состоящий из нескольких
 * элементов. Например, в следующем ассоциативном массиве в качестве ключа служит Ф.И.О.
 * учащегося, а качестве значения — ассоциативный массив, состоящий из классов и идентифи-
 * кационных номеров учащихся:
 * $students =
 *     [ 'James D. McCawley' => [ 'grade' => 'A+', 'id' => 271231 ],
 *     'Buwei Yang Chao' => [ 'grade' => 'A', 'id' => 818211] ];
 *     • Классы и идентификационные номера учащихся в классе.
 *     • Количество каждого товара в запасах на складе.
 *     • Школьные обеды, состоящие из разных блюд (закуски, салаты, напитки и т.д.), а также
 *     их стоимость на каждый день недели.
 *     • Имена членов вашей семьи.
 *     • Имена, возраст и родство членов вашей семьи.
 */
$students = [ 'James D. McCawley' => [ 'grade' => 'A+', 'id' => 271231 ],
              'Buwei Yang Chao' => [ 'grade' => 'A', 'id' => 818211] ];
$products = [ 'Капуста' => [ 'count' => 5 ],
              'Картофель' => ['count' => 120] ];
$school_lunches = [ 'Закуски' => [ 'Гренки' => 7,
                                   'Рулеты с ветчиной' => 5],
                    'Салаты' => [ 'Оливье' => 4,
                                  'Цезарь' => 3],
                    'Напитки' => [ 'Чай' => 0.5,
                                   'Кофе' => 0.5] ];
?>