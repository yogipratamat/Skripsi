<?php
function price($price)
{
    $output = 'Rp. ' . number_format($price, 2, ',', '.');
    return $output;
}

function cartCount()
{

    $b = 0;

    $a = session()->get('carts');

    if ($a) {
        $b = count($a);
    }

    return $b;
}

function idFormat($date)
{
    $output = \Carbon\Carbon::parse($date)->translatedFormat('d F Y');

    return $output;
}
