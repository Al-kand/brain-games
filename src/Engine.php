<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const MAX_COUNTS = 3;

function start(string $condition): void
{
    global $name;
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($condition);
}

function isContinue(string $task, string $correctAnswer): bool
{
    global $count, $name;
    $count = $count ?? 1;

    line("Question: %s", $task);
    $answer = prompt("Your answer");

    if ($answer === $correctAnswer) {
        line("Correct!");
        if ($count < MAX_COUNTS) {
            $count++;
            return true;
        }
        line("Congratulations, %s!", $name);
        return false;
    }

    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
    line("Let's try again, %s!", $name);
    return false;
}

function getRandomNumber($min = 1, $max = 9): int
{
    return rand($min, $max);
}
