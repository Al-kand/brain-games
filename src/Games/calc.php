<?php

namespace Brain\Games\calc;

use Brain\Engine;

function playGame(): void
{
    $condition = 'What is the result of the expression?';

    Engine\start($condition);

    $continue = true;
    $operators = ['+', '-', '*'];

    while ($continue) {
        $arg1 = getRandomNumber();
        $arg2 = getRandomNumber();
        $operator = $operators[array_rand($operators)];
        $task = "{$arg1} {$operator} {$arg2}";
        $correctAnswer = getCorrestAnswer($arg1, $arg2, $operator);
        $continue = Engine\isContinue($task, $correctAnswer);
    }
}

function getRandomNumber($min = 1, $max = 9): int
{
    return rand($min, $max);
}

function getCorrestAnswer(int $num1, int $num2, string $operator): int
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
    return $result;
}
