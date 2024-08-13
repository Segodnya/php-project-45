<?php

namespace Hexlet\Code\Games\Even;

use function Hexlet\Code\Engine\runGame;

const MIN_NUM = 1;
const MAX_NUM = 100;

function getQuestionAndAnswer()
{
    $number = rand(MIN_NUM, MAX_NUM);
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [$number, $correctAnswer];
}

function isEven($number)
{
    return $number % 2 === 0;
}

function evenGame()
{
    runGame(__NAMESPACE__ . '\getQuestionAndAnswer');
}
