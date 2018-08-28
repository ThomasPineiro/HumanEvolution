<?php

include 'personnage.php';

$partie = new Partie();
$char_number = 0;
for ($char_number; $char_number<20; $char_number++)
{
$perso = new Personnage();
$perso->enregistrerPerso();
$perso->enregistrerPartiePerso();
};
$result = $partie->recupStatsPartie();
var_dump($result);

?>