<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Engine\runGame;

function getQuestionAndAnswer()
{
    $number = rand(1, 100);

    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [$number, $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}

function evenGame()
{
    runGame('Hexlet\Code\Games\Even\getQuestionAndAnswer');
}
