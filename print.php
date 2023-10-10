<?php
require __DIR__ . '/vendor/autoload.php';

$argument = array_slice($argv, 1);
$value = reset($argument);
$value = strtolower($value);
$date = new DateTime();
$columns = ['Ticket','Last Change','Link'];
if($value == 'build'){
    $rows = [
        ['ASD-153', $date->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-155', $date->sub(new DateInterval('PT24H'))->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-180', $date->sub(new DateInterval('PT5H'))->format('d.m.Y'), 'https://www.google.de']
    ];
}
if($value == 'deploy'){
    $rows = [
        ['ASD-160', $date->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-161', $date->sub(new DateInterval('PT4H'))->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-162', $date->sub(new DateInterval('PT62H'))->format('d.m.Y'), 'https://www.google.de']
    ];
}
if($value == 'cleanup'){
    $rows = [
        ['ASD-180', $date->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-190', $date->sub(new DateInterval('PT27H'))->format('d.m.Y'), 'https://www.google.de'],
        ['ASD-210', $date->sub(new DateInterval('PT56H'))->format('d.m.Y'), 'https://www.google.de']
    ];
}

$printer = new \Tom\GhActionsTestarea\Printer($columns, $rows);

echo $printer->render();