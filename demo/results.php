<?php

include_once dirname(__DIR__) . '/vendor/autoload.php';

$mixed = [1, 2, 3, 4];

$stack = new \Bavix\Foundation\Arrays\Stack($mixed);
foreach ($stack->getGenerator() as $item)
{
    var_dump($item);
}

$queue = new \Bavix\Foundation\Arrays\Queue($mixed);
foreach ($queue->getGenerator() as $item)
{
    var_dump($item);
}
