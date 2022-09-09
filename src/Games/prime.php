<?php

namespace Brain\Games\prime;

use Brain\Engine;

const CONDITION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function playGame(): void
{
    Engine\start(CONDITION);

    $continue = true;
    $count = 0;

    while ($continue) {
        $random = Engine\getRandomNumber(0, 99);
        $task = (string) $random;
        $correctAnswer = isPrime($random) ? 'yes' : 'no';
        $count++;
        $continue = Engine\isContinue($task, $correctAnswer, $count);
    }
    return;
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
