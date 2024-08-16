<?php

namespace Hexlet\Code\Games\Prime;

use Hexlet\Code\Engine;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 2;
const MAX_NUM = 100;
const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < Engine\ATTEMPTS_COUNT; $i++) {
        $num = rand(MIN_NUM, MAX_NUM);
        $isPrime = isPrime($num) ? 'yes' : 'no';
        $questionsAndAnswers[] = [sprintf('%d', $num), $isPrime];
    }

    return $questionsAndAnswers;
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
    $questionsAndAnswers = getQuestionsAndAnswers();
    runGame(RULE, $questionsAndAnswers);
}
