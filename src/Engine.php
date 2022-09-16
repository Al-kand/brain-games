<?php

namespace Brain\Engine;

use function cli\line;
use function cli\prompt;

function runGame(int $count, string $condition, string $namespase): void
{
    $data = [];

    $getParams = $namespase . '\makeGameData';
    for ($i = 0; $i < $count; $i++) {
        $data[] = $getParams();
    }

    play($condition, $data);
}

function play(string $condition, array $data): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($condition);

    foreach ($data as $roundData) {
        line("Question: %s", $roundData['task']);
        $answer = prompt("Your answer");

        $correctAnswer = $roundData['correctAnswer'];

        if ($answer === $correctAnswer) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
