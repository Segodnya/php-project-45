<?php

namespace Hexlet\Code\Games\Calc;

use Hexlet\Code\Engine;

use function Hexlet\Code\Engine\runGame;

const OPERATIONS = ['+', '-', '*'];
const MIN_NUM = 1;
const MAX_NUM = 100;
const RULE = "What is the result of the expression?";

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < Engine\ATTEMPTS_COUNT; $i++) {
        $num1 = rand(MIN_NUM, MAX_NUM);
        $num2 = rand(MIN_NUM, MAX_NUM);
        $operation = OPERATIONS[array_rand(OPERATIONS)];
        $expression = sprintf('%d %s %d', $num1, $operation, $num2);
        $result = calculate($num1, $num2, $operation);
        $questionsAndAnswers[] = [$expression, (string) $result];
    }

    return $questionsAndAnswers;
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
    $questionsAndAnswers = getQuestionsAndAnswers();
    runGame(RULE, $questionsAndAnswers);
}
