<?php

namespace Hexlet\Code\Engine;

use function cli\line;
use function cli\prompt;

const ATTEMPTS_COUNT = 3;

function runGame(string $rule, array $questionsAndAnswers)
{
    // Здесь можно было бы использовать Cli/welcomeUser,
    // но по ТЗ мы не можем импортировать эту функцию здесь.
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($rule);

    for ($i = 0; $i < ATTEMPTS_COUNT; $i++) {
        [$question, $correctAnswer] = $questionsAndAnswers[$i];
        
        $isCorrect = playRound($question, $correctAnswer, $name);

        if (!$isCorrect) {
            return;
        }
    }

    line('Congratulations, %s!', $name);
}

function playRound(string $question, string $correctAnswer, string $playerName): bool
{
    line("Question: %s", $question);
    $answer = prompt('Your answer');

    return processAnswer($answer, $correctAnswer, $playerName);
}

function processAnswer(string $answer, string $correctAnswer, string $playerName): bool
{
    if ($answer !== $correctAnswer) {
        line("'%s' is the wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
        line("Let's try again, %s!", $playerName);

        return false;
    }

    line('Correct!');

    return true;
}
