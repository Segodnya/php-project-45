<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Cli\welcomeUser;
use function Hexlet\Code\Engine\runGame;

const OPERATIONS = ['+', '-', '*'];
const MIN_NUM = 1;
const MAX_NUM = 100;
const RULE = "What is the result of the expression?";

function getGameRules()
{
    $num1 = rand(MIN_NUM, MAX_NUM);
    $num2 = rand(MIN_NUM, MAX_NUM);
    $operation = OPERATIONS[array_rand(OPERATIONS)];

    $expression = sprintf('%d %s %d', $num1, $operation, $num2);
    $result = calculate($num1, $num2, $operation);

    return [RULE, $expression, (string) $result];
}

function calculate(int $num1, int $num2, string $operation): int
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Unknown operation');
    }
}

function calcGame()
{
    $playerName = welcomeUser();

    runGame($playerName, __NAMESPACE__ . '\getGameRules');
}
