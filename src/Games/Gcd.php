<?php

namespace Hexlet\Code\Games\Gcd;

use Hexlet\Code\Engine;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;
const RULE = "Find the greatest common divisor of given numbers.";

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < Engine\ATTEMPTS_COUNT; $i++) {
        $num1 = rand(MIN_NUM, MAX_NUM);
        $num2 = rand(MIN_NUM, MAX_NUM);
        $gcd = calculateGcd($num1, $num2);
        $questionsAndAnswers[] = [sprintf('%d %d', $num1, $num2), (string) $gcd];
    }

    return $questionsAndAnswers;
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
    $questionsAndAnswers = getQuestionsAndAnswers();
    runGame(RULE, $questionsAndAnswers);
}
