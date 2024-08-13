<?php

namespace Hexlet\Code\Games\Prime;

use function Hexlet\Code\Engine\runGame;

function getQuestionAndAnswer()
{
    $num = rand(2, 100);
    $isPrime = isPrime($num) ? 'yes' : 'no';

    return [sprintf('%d', $num), $isPrime];
}

function isPrime($number)
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}

function primeGame()
{
    runGame('Hexlet\Code\Games\Prime\getQuestionAndAnswer');
}
