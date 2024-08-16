<?php

namespace Hexlet\Code\Games\Progression;

use Hexlet\Code\Engine;

use function Hexlet\Code\Engine\runGame;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_START = 1;
const MAX_START = 20;
const MIN_STEP = 2;
const MAX_STEP = 5;
const RULE = "What number is missing in the progression?";

function getQuestionsAndAnswers(): array
{
    $questionsAndAnswers = [];

    for ($i = 0; $i < Engine\ATTEMPTS_COUNT; $i++) {
        $length = rand(MIN_LENGTH, MAX_LENGTH);
        $start = rand(MIN_START, MAX_START);
        $step = rand(MIN_STEP, MAX_STEP);
        $progression = createProgression($start, $step, $length);
        $hiddenIndex = rand(0, $length - 1);
        $correctAnswer = (string) $progression[$hiddenIndex];
        $progression[$hiddenIndex] = '..';
        $questionsAndAnswers[] = [implode(' ', $progression), $correctAnswer];
    }

    return $questionsAndAnswers;
}

function createProgression(int $start, int $step, int $length): array
{
    return array_map(fn($i) => $start + $i * $step, range(0, $length - 1));
}

function progressionGame()
{
    $questionsAndAnswers = getQuestionsAndAnswers();
    runGame(RULE, $questionsAndAnswers);
}
