<?php

namespace Hexlet\Code\Games\Progression;

use function Hexlet\Code\Engine\runGame;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;
const MIN_START = 1;
const MAX_START = 20;
const MIN_STEP = 2;
const MAX_STEP = 5;

function getQuestionAndAnswer()
{
    $length = rand(MIN_LENGTH, MAX_LENGTH);
    $start = rand(MIN_START, MAX_START);
    $step = rand(MIN_STEP, MAX_STEP);

    $progression = createProgression($start, $step, $length);

    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = (string) $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    return [implode(' ', $progression), $correctAnswer];
}

function createProgression($start, $step, $length)
{
    return array_map(fn($i) => $start + $i * $step, range(0, $length - 1));
}

function progressionGame()
{
    runGame(__NAMESPACE__ . '\getQuestionAndAnswer');
}
