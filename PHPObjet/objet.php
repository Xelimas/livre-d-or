<?php
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Interval.php';
require __DIR__ . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Form.php';

/*
$date = new DateTime();
$maDate = $date->format('d/m/Y');
echo $maDate;

$date1 = '2020-01-01';
$date2 = '2008-05-23';

$d1 = new DateTime($date1);
$d2 = new DateTime($date2);

$diff = $d1->diff($d2, true);

//echo "Il y a {$diff->days} jours de différences entre les deux dates";
echo "Il y a {$diff->y} annnées, {$diff->m} mois et {$diff->d} jours de différences entre les deux dates";
*/

//phpinfo();

$interval1 = new Interval(9, 12);
$interval2 = new Interval(10, 13);

//var_dump($interval1->isBetween(10));
//var_dump($interval1->intersect($interval2));

echo Form::checkbox('demo', 'Demo');