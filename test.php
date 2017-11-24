<?php
require_once('./connexion.php');
$row = $bdd->query("SHOW COLUMNS FROM produit LIKE 'unite';");
$ligne= ($row->fetch(PDO::FETCH_ASSOC));
preg_match('/enum\(\'(.*)\'\)$/', $ligne['Type'], $matches);
$values = explode('\',\'', $matches[1]);
print_r ($values);


