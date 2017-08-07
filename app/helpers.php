<?php


function dump()
{
    echo '<pre>'.PHP_EOL;
    array_map(function($x) { var_dump($x); }, func_get_args());
    die;
}


function formatDatetime($datetime)
{
    return date('m-d-Y H:i', strtotime($datetime));
}
