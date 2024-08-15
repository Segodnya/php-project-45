<?php

namespace Hexlet\Code\Games\Gcd;

use function Hexlet\Code\Cli\welcomeUser;
use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;
const RULE = "Find the greatest common divisor of given numbers.";

function getGameRules()
{
    $num1 = rand(MIN_NUM, MAX_NUM);
    $num2 = rand(MIN_NUM, MAX_NUM);
    $gcd = calculateGcd($num1, $num2);

    return [RULE, sprintf('%d %d', $num1, $num2), (string) $gcd];
}

function calculateGcd(int $a, int $b): int
{
    while ($b) {
        [$a, $b] = [$b, $a % $b];
    }

    return $a;
}

function gcdGame()
{
    $playerName = welcomeUser();

    runGame($playerName, __NAMESPACE__ . '\getGameRules');
}
