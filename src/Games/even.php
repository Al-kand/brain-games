<?php

namespace Brain\Games\even;

use Brain\Engine;

function playGame(): void
{
    $condition = 'Answer "yes" if the number is even, otherwise answer "no".';

    Engine\start($condition);

    $continue = true;

    while ($continue) {
        $random = Engine\getRandomNumber(0, 999);
        $task = (string) $random;
        $correctAnswer = isEven($random) ? 'yes' : 'no';
        $continue = Engine\isContinue((string) $task, $correctAnswer);
    }
    return;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
