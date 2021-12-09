<?php

function format_money($money)
{
    if(!$money) {
        return "0.00 NT\$";
    }

    $money = number_format($money, 2);

    if(strpos($money, '-') !== false) {
        $formatted = explode('-', $money);
        return "-\$$formatted[1]";
    }

    return "$money NT\$";
}