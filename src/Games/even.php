<?php

namespace Brain\Games\even;

use Brain\Engine;

const CONDITION = 'Answer "yes" if the number is even, otherwise answer "no".';

function playGame(): void
{
    $continue = true;
    $count = 0;

    $playerName = Engine\getPlayerName(CONDITION);

    while ($continue) {
        $random = Engine\getRandomNumber(0, 999);
        $task = (string) $random;
        $correctAnswer = isEven($random) ? 'yes' : 'no';
        $count++;
        $continue = Engine\isContinue($task, $correctAnswer, $count, $playerName);
    }
    return;
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
