<?php

// Добавляем неймспейс
namespace Hexlet\Code\Even;

use function cli\line;
use function cli\prompt;
use function Hexlet\Code\Cli\welcomeUser;

const TRIES_COUNT = 3;

/**
 * Генерирует случайное число от 1 до 100
 * @return number
 */
function getRandomNumber()
{
    return rand(1, 100);
}

/**
 * Проверяет на четность переданное число
 * @param mixed $number
 * @return bool
 */
function isEven($number)
{
    return $number % 2 === 0;
}

function evenGame()
{
    $name = welcomeUser();

    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < TRIES_COUNT; $i++) {
        $number = getRandomNumber();
        line("Question: %d", $number);

        $answer = prompt('Your answer:');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);

            // Завершаем игру при ошибочном ответе
            return;
        }

        line('Correct!');
    }

    line('Congratulations, %s!', $name);
}
