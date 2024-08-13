<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Engine\runGame;

const OPERATIONS = ['+', '-', '*'];
const MIN_NUM = 1;
const MAX_NUM = 100;

function getGameRules()
{
    $rule = "What is the result of the expression?";

    $num1 = rand(MIN_NUM, MAX_NUM);
    $num2 = rand(MIN_NUM, MAX_NUM);
    $operation = OPERATIONS[array_rand(OPERATIONS)];

    $expression = sprintf('%d %s %d', $num1, $operation, $num2);
    $result = calculate($num1, $num2, $operation);

    return [$rule, $expression, (string) $result];
}

function calculate($num1, $num2, $operation)
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
    runGame(__NAMESPACE__ . '\getGameRules');
}
