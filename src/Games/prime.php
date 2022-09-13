<?php

namespace Brain\Games\prime;

use function Brain\Engine\runGame;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';
const MAX_COUNTS = 3;
const MIN_ARG = 1;
const MAX_ARG = 100;

function playGame(): void
{
    $gameData = [];

    for ($i = 0; $i < MAX_COUNTS; $i++) {
        $random = rand(MIN_ARG, MAX_ARG);
        $task = (string) $random;
        $correctAnswer = isPrime($random) ? 'yes' : 'no';
        $gameData[] = compact('task', 'correctAnswer');
    }

    runGame(CONDITION, $gameData);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
