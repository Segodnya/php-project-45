<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;
use function Hexlet\Code\Cli\welcomeUser;

const ATTEMPTS_COUNT = 3;

function runGame($getGameRules)
{
    $name = welcomeUser();

    [$rule, ,] = $getGameRules();

    line($rule);

    for ($i = 0; $i < ATTEMPTS_COUNT; $i++) {
        [, $question, $correctAnswer] = $getGameRules();

        $isCorrect = playRound($question, $correctAnswer, $name);

        if (!$isCorrect) {
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

function playRound($question, $correctAnswer, $name)
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');

    return processAnswer($answer, $correctAnswer, $name);
}

function processAnswer($answer, $correctAnswer, $name)
{
    if ($answer !== $correctAnswer) {
        line("'%s' is the wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s!", $name);

        return false;
    }

    line('Correct!');

    return true;
}
