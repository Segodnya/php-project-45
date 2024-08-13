<?php

namespace Hexlet\Code\Games\Progression;

use function Hexlet\Code\Engine\runGame;

const MIN_LENGTH = 5;
const MAX_LENGTH = 10;

function getQuestionAndAnswer()
{
    $length = rand(MIN_LENGTH, MAX_LENGTH);
    $start = rand(1, 20);
    $step = rand(2, 5);

    $progression = [];

    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + $i * $step;
    }

    $hiddenIndex = rand(0, $length - 1);
    $correctAnswer = (string) $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    return [implode(' ', $progression), $correctAnswer];
}

function progressionGame()
{
    runGame('Hexlet\Code\Games\Progression\getQuestionAndAnswer');
}
