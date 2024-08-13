<?php

namespace Hexlet\Code\Games\Gcd;

use function Hexlet\Code\Engine\runGame;

function getQuestionAndAnswer()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $gcd = calculateGcd($num1, $num2);

    return [sprintf('%d %d', $num1, $num2), (string) $gcd];
}

function calculateGcd($a, $b)
{
    while ($b) {
        $temp = $b;
        $b = $a % $b;
        $a = $temp;
    }

    return $a;
}

function gcdGame()
{
    runGame('Hexlet\Code\Games\Gcd\getQuestionAndAnswer');
}
