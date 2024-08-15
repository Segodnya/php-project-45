<?php

namespace Hexlet\Code\Games\Prime;

use function Hexlet\Code\Cli\welcomeUser;
use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 2;
const MAX_NUM = 100;
const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getGameRules()
{
    $num = rand(MIN_NUM, MAX_NUM);
    $isPrime = isPrime($num) ? 'yes' : 'no';

    return [RULE, sprintf('%d', $num), $isPrime];
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
    $playerName = welcomeUser();

    runGame($playerName, __NAMESPACE__ . '\getGameRules');
}
