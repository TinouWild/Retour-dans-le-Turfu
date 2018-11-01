<?php
/**
 * Created by PhpStorm.
 * User: etienne
 * Date: 01/11/18
 * Time: 21:00
 */

require 'TimeTravel.php';

$timeTravel = new TimeTravel();
$debut = $timeTravel->start->setDate(1985, 12, 31);
echo "L'accident temporel de Doc a eu lieu le ".$debut->format('Y m d').".<br>";
echo '<hr>';

echo "Mais à quelle date se trouve Doc ?<br>";
$interval = new DateInterval('PT1000000000S');
echo "1 milliard de secondes plus tôt, Doc se retrouve coincé à la date du ".$timeTravel->findDate($interval).".";
echo '<hr>';

$timeTravel->end->setDate(1954, 04, 23);
$timeTravel->start->setDate(1985, 12, 31);

echo $timeTravel->getTravelInfo()."<br>";
echo "MINCE, le réservoir est cassé, on ne peut que faire un saut de 1 mois, 1 semaine et 1 jour !<br>";
echo "Il est temps de paramétrer le convecteur temporel !<br>";
echo '<hr>';

$interval2 = new DateInterval('P1M8D');

$step = new DatePeriod($timeTravel->end, $interval2, $timeTravel->start);
$etapes = $timeTravel->backToFutureStepByStep($step);

echo "Le chemin va être long (trop long ?), voici toutes les étapes du voyage pour aller chercher Doc !".'<br>';
foreach ($etapes as $etape) {
    echo "$etape".'<br>';
}