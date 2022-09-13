<?php

namespace Brain\Games\calc;

use function Brain\Engine\runGame;

const CONDITION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];
const MAX_COUNTS = 3;
const MIN_ARG = 0;
const MAX_ARG = 9;

function playGame(): void
{
    $gameData = [];

    for ($i = 0; $i < MAX_COUNTS; $i++) {
        $arg1 = rand(MIN_ARG, MAX_ARG);
        $arg2 = rand(MIN_ARG, MAX_ARG);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $task = "{$arg1} {$operator} {$arg2}";
        $correctAnswer = (string) getCorrestAnswer($arg1, $arg2, $operator);
        $gameData[] = compact('task', 'correctAnswer');
    }

    runGame(CONDITION, $gameData);
}

function getCorrestAnswer(int $num1, int $num2, string $operator): ?int
{
    switch ($operator) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
    }
    return $result ?? null;
}
