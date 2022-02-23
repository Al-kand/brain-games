<?php

namespace Brain\Games\even;

use function cli\line;
use function cli\prompt;

function playGame(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    line('Answer "yes" if the number is even, otherwise answer "no".');

    $numOfRounds = 3;

    for ($i = 0; $i < $numOfRounds; $i++) {
        $askedNumber = rand();
        line("Question: %s", $askedNumber);
        $answer = prompt("Your answer");

        $correctAnswer = isBool($askedNumber) ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
    return;
}

function isBool(int $number): bool
{
    return $number % 2 === 0;
}
