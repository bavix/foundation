<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$collection = new \Bavix\Foundation\Arrays\Collection([
    'add'  => 'help1',
    'info' => 'help2',
]);

$diff = new \Bavix\Foundation\Arrays\Collection(['js' => 'help1']);

$data = $collection
    ->reverse()
    ->map('mb_strtoupper')
    ->diff($diff->map('mb_strtoupper'))
    ->merge($diff)
    ->keys()
    ->values();

var_dump($data);

$data = $collection
    ->reverse()
    ->diff($diff)
    ->values();

var_dump($data);

$collection = new \Bavix\Foundation\Arrays\Collection([
    'a' => new Bavix\Iterator\Iterator([
        'name' => 'Ivan',
        'age'  => 24
    ]),
    'b' => new Bavix\Iterator\Iterator([
        'name' => 'Petr',
        'age'  => 22
    ]),
    'c' => new Bavix\Iterator\Iterator([
        'name' => 'Alex',
        'age'  => 27
    ]),
]);

$data = $collection->shuffle()->column('name');

var_dump($data);
