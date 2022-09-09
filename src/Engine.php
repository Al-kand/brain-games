<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

const MAX_COUNTS = 3;

function start(string $condition): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    define("PLAYER_NAME", $name);
    line("Hello, %s!", PLAYER_NAME);
    line($condition);
}

function isContinue(string $task, string $correctAnswer, int $currentCount): bool
{
    line("Question: %s", $task);
    $answer = prompt("Your answer");

    if ($answer === $correctAnswer) {
        line("Correct!");
        if ($currentCount < MAX_COUNTS) {
            return true;
        }
        line("Congratulations, %s!", PLAYER_NAME);
        return false;
    }

    line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
    line("Let's try again, %s!", PLAYER_NAME);
    return false;
}

function getRandomNumber(int $min = 1, int $max = 9): int
{
    return rand($min, $max);
}
