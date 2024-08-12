<?php

namespace Hexlet\Code\Games\Calc;

use function Hexlet\Code\Engine\runGame;

function getQuestionAndAnswer()
{
    $operations = ['+', '-', '*'];
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    $operation = $operations[array_rand($operations)];

    $expression = sprintf('%d %s %d', $num1, $operation, $num2);
    $result = calculate($num1, $num2, $operation);

    return [$expression, (string) $result];
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
    runGame('Hexlet\Code\Games\Calc\getQuestionAndAnswer');
}
