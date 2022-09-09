<?php

namespace Brain\Games\calc;

use Brain\Engine;

const CONDITION = 'What is the result of the expression?';
const OPERATORS = ['+', '-', '*'];

function playGame(): void
{
    $continue = true;
    $count = 0;
    $operators = ['+', '-', '*'];

    Engine\start(CONDITION);

    while ($continue) {
        $arg1 = Engine\getRandomNumber();
        $arg2 = Engine\getRandomNumber();
        $operator = $operators[array_rand(OPERATORS)];
        $task = "{$arg1} {$operator} {$arg2}";
        $correctAnswer = (string) getCorrestAnswer($arg1, $arg2, $operator);
        $count++;
        $continue = Engine\isContinue($task, $correctAnswer, $count);
    }
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
