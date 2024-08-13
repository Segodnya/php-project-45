<?php

namespace Hexlet\Code\Games\Gcd;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getQuestionAndAnswer()
{
    $num1 = rand(MIN_NUM, MAX_NUM);
    $num2 = rand(MIN_NUM, MAX_NUM);
    $gcd = calculateGcd($num1, $num2);

    return [sprintf('%d %d', $num1, $num2), (string) $gcd];
}

function calculateGcd($a, $b)
{
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }
    return $a;
}

function gcdGame()
{
    runGame(__NAMESPACE__ . '\getQuestionAndAnswer');
}
