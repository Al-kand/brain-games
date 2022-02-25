<?php

namespace Brain\Games\even;

use Brain\Engine;

function playGame(): void
{
    $condition = 'Answer "yes" if the number is even, otherwise answer "no".';

    Engine\start($condition);

    $continue = true;

    while ($continue) {
        $task = (string) Engine\getRandomNumber(0, 999);
        $correctAnswer = isBool($task) ? 'yes' : 'no';
        $continue = Engine\isContinue($task, $correctAnswer);
    }
    return;
}

function isBool(int $number): bool
{
    return $number % 2 === 0;
}
