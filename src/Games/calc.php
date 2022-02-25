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
        $arg1 = Engine\getRandomNumber();
        $arg2 = Engine\getRandomNumber();
        $operator = $operators[array_rand($operators)];
        $task = "{$arg1} {$operator} {$arg2}";
        $correctAnswer = (string) getCorrestAnswer($arg1, $arg2, $operator);
        $continue = Engine\isContinue($task, $correctAnswer);
    }
}

function getCorrestAnswer(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
            break;
        case '-':
            return $num1 - $num2;
            break;
        case '*':
            return $num1 * $num2;
            break;
    }
}
