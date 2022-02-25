<?php

namespace Brain\Games\progression;

use Brain\Engine;

function playGame(): void
{
    $condition = 'What number is missing in the progression?';

    Engine\start($condition);

    $continue = true;

    while ($continue) {
        $length = Engine\getRandomNumber(5, 10);
        $hiddenKey = Engine\getRandomNumber(0, $length - 1);
        $progression = makeProgression($length);
        $correctAnswer = (string) $progression[$hiddenKey];
        $progression[$hiddenKey] = '..';
        $task = implode(' ', $progression);

        $continue = Engine\isContinue($task, $correctAnswer);
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
