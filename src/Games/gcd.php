<?php

namespace Brain\Games\gcd;

use Brain\Engine;

const CONDITION = 'Find the greatest common divisor of given numbers.';

function playGame(): void
{
    Engine\start(CONDITION);

    $continue = true;
    $count = 0;

    while ($continue) {
        $arg1 = Engine\getRandomNumber(1, 100);
        $arg2 = Engine\getRandomNumber(1, 100);

        $task = "{$arg1} {$arg2}";
        $correctAnswer = (string) gcd($arg1, $arg2);
        $count++;
        $continue = Engine\isContinue($task, $correctAnswer, $count);
    }
}

function gcd(int $a, int $b): int
{
    $large = $a > $b ? $a : $b;
    $small = $a > $b ? $b : $a;
    $remainder = $large % $small;
    return 0 === $remainder ? $small : gcd($small, $remainder);
}
