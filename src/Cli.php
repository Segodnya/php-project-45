<?php

// Добавляем неймспейс
namespace Hexlet\Code\Cli;

// "Импортируем" (как import в js) библиотеки
use function cli\line;
use function cli\prompt;

function welcomeUser()
{
    line('Welcome to the Brain Games!');

    $name = prompt('May I have your name?');

    line("Hello, %s!", $name);

    return $name;
}
