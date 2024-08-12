<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;
use function Hexlet\Code\Cli\welcomeUser;

const ATTEMPTS_COUNT = 3;

function runGame($getQuestionAndAnswer)
{
    $name = welcomeUser();

    for ($i = 0; $i < ATTEMPTS_COUNT; $i++) {
        [$question, $correctAnswer] = $getQuestionAndAnswer();

        line("Question: %s", $question);

        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'%s' is the wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);

            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
