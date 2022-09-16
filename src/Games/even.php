<?php

namespace Brain\Games\even;

use function Brain\Engine\runGame;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';
const MAX_COUNTS = 3;
const MIN_ARG = 0;
const MAX_ARG = 999;
const GAME = 'even';

function playGame(): void
{
    runGame(MAX_COUNTS, CONDITION, GAME);
}

function makeGameData(): array
{
    $random = rand(MIN_ARG, MAX_ARG);
    $task = (string) $random;
    $correctAnswer = isEven($random) ? 'yes' : 'no';
    return compact('task', 'correctAnswer');
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
