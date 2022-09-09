<?php

namespace Brain\Games\progression;

use Brain\Engine;

const CONDITION = 'What number is missing in the progression?';

function playGame(): void
{
    $continue = true;
    $count = 0;

    $playerName = Engine\getPlayerName(CONDITION);

    while ($continue) {
        $length = Engine\getRandomNumber(5, 10);
        $hiddenKey = Engine\getRandomNumber(0, $length - 1);
        $progression = makeProgression($length);
        $correctAnswer = (string) $progression[$hiddenKey];
        $progression[$hiddenKey] = '..';
        $task = implode(' ', $progression);
        $count++;
        $continue = Engine\isContinue($task, $correctAnswer, $count, $playerName);
    }
}

function makeProgression(int $length): array
{
    $firstArg = Engine\getRandomNumber(1, 50);
    $step = Engine\getRandomNumber(2, 9);
    $result = [$firstArg];

    for ($i = 1; $i < $length; $i++) {
        $result[$i] = $result[$i - 1] + $step;
    }

    return $result;
}
