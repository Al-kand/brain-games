<?php

namespace Brain\Games\prime;

use Brain\Engine;

function playGame(): void
{
    $condition = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    Engine\start($condition);

    $continue = true;

    while ($continue) {
        $task = Engine\getRandomNumber(0, 99);
        $correctAnswer = isPrime($task) ? 'yes' : 'no';
        $continue = Engine\isContinue($task, $correctAnswer);
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
