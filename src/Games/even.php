<?php

namespace Brain\Games\even;

use Brain\Engine;

function playGame(): void
{
    $condition = 'Answer "yes" if the number is even, otherwise answer "no".';

    Engine\start($condition);

    $continue = true;

    while ($continue) {
        $task = rand();
        $correctAnswer = isBool($task) ? 'yes' : 'no';
        $continue = Engine\isContinue($task, $correctAnswer);
    }
    return;
}

function isBool(int $number): bool
{
    return $number % 2 === 0;
}
