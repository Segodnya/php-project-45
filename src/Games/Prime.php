<?php

namespace Hexlet\Code\Games\Prime;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 2;
const MAX_NUM = 100;

function getGameRules()
{
    $rule = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $num = rand(MIN_NUM, MAX_NUM);
    $isPrime = isPrime($num) ? 'yes' : 'no';

    return [$rule, sprintf('%d', $num), $isPrime];
}

function isPrime(int $number): bool
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
    runGame(__NAMESPACE__ . '\getGameRules');
}
