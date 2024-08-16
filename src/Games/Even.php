<?php

namespace Hexlet\Code\Games\Even;

use Hexlet\Code\Engine;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;
const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < Engine\ATTEMPTS_COUNT; $i++) {
        $number = rand(MIN_NUM, MAX_NUM);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $questionsAndAnswers[] = [$number, $correctAnswer];
    }

    return $questionsAndAnswers;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function evenGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    runGame(RULE, $questionsAndAnswers);
}
