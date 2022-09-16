<?php

namespace Brain\Games\progression;

use function Brain\Engine\runGame;

const CONDITION = 'What number is missing in the progression?';
const MAX_COUNTS = 3;

const MIN_LENHGHT = 5;
const MAX_LENGHT = 10;

const MIN_ARG = 1;
const MAX_ARG = 50;

const MIN_STEP = 2;
const MAX_STEP = 9;

const GAME = 'progression';

function playGame(): void
{
    runGame(MAX_COUNTS, CONDITION, GAME);
}

function makeGameData(): array
{
    $length = rand(MIN_LENHGHT, MAX_LENGHT);
    $hiddenKey = rand(0, $length - 1);
    $progression = makeProgression($length);
    $correctAnswer = (string) $progression[$hiddenKey];
    $progression[$hiddenKey] = '..';
    $task = implode(' ', $progression);
    return compact('task', 'correctAnswer');
}

function makeProgression(int $length): array
{
    $firstArg = rand(MIN_ARG, MAX_ARG);
    $step = rand(MIN_STEP, MAX_STEP);
    $result = [$firstArg];

    for ($i = 1; $i < $length; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}
