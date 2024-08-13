<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameRules()
{
    $rule = 'Answer "yes" if the number is even, otherwise answer "no".';
    $number = rand(MIN_NUM, MAX_NUM);
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [$rule, $number, $correctAnswer];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function evenGame()
{
    runGame(__NAMESPACE__ . '\getGameRules');
}
