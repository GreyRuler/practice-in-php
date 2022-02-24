<?php
/**
 * Напишите программу, в которой все блюда, находящиеся в таблице dishes, перечисляются
 * отсортированными по цене.
 */
try {
    $db = new PDO("pgsql:host=localhost;port=5432;dbname=restaurant;user=postgres;password=Wither757!");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $q = $db->query("SELECT * FROM dishes ORDER BY price");
    while($row = $q->fetch()) {
        print "$row[2] $row[1]\n";
    }
} catch (PDOException $e) {
    print "Соединение прошло не удачно:".$e->getMessage();
}
?>