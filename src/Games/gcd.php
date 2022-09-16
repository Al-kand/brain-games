<?php

namespace Brain\Games\gcd;

use function Brain\Engine\runGame;

const CONDITION = 'Find the greatest common divisor of given numbers.';
const MAX_COUNTS = 3;
const MIN_ARG = 1;
const MAX_ARG = 100;

function playGame(): void
{
    runGame(MAX_COUNTS, CONDITION, __NAMESPACE__);
}

function makeGameData(): array
{
    $arg1 = rand(MIN_ARG, MAX_ARG);
    $arg2 = rand(MIN_ARG, MAX_ARG);
    $task = "{$arg1} {$arg2}";
    $correctAnswer = (string) gcd($arg1, $arg2);

    return compact('task', 'correctAnswer');
}

function gcd(int $a, int $b): int
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return 0 === $remainder ? $small : gcd($small, $remainder);
}
