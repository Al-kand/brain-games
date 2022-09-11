<?php

namespace Brain\Games\even;

use Brain\Engine;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_COUNTS = 3;
const MIN_ARG = 0;
const MAX_ARG = 999;

function playGame(): void
{
    $gameData = [];

    for ($i = 0; $i < MAX_COUNTS; $i++) {
        $random = rand(MIN_ARG, MAX_ARG);
        $task = (string) $random;
        $correctAnswer = isEven($random) ? 'yes' : 'no';
        $gameData[] = compact('task', 'correctAnswer');
    }

    Engine\runGame(CONDITION, $gameData);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
