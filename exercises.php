<?php

function choiceLoop(string $exerciseOption) {
    $choice = -1;
    $exerciseTitle = [
        "Calculator"
    ];

    // Welcome
    echo "\n\nWelcome to ".$exerciseTitle[$exerciseOption]." exercise!\n";

    // Start a loop for exercise.
    while ($choice != 0) {

        // Ask the user for their choice.
        echo "Choose an option from 1 to 8 to access exercises, or 0 to quit: ";
        $choice = strtolower(trim(fgets(STDIN)));

        // If the user chooses an option from 1 to 8, do something.
        if ($choice > 0 && $choice < 9) {
            echo "You chose option $choice.\n\n";
        }

        // If the user choices is invalid, tell her to try again.
        if (!is_numeric($choice) || $choice < 0 || $choice >8) {
            echo "This option doesn't exist. Please try again.\n\n";
            sleep(1);
        }

        // If the user chooses 0, break out of the loop.
        if ($choice == 0) {
            echo "The program has ended.";
            break;
        }
    }
}

// /* exercise 1
// /  Get two numbers and operator,
// /  realize the operation and return the result.
// */
// function calculator() {
//     // Welcome to calculator
//     echo("Welcome to calculator");
//     echo("Please. Type the first number of operation:");
//     $num1 = strtolower(trim(fgets(STDIN)));

//     echo("Choose what operation you like to do:");

//     if(!is_numeric($num1) || !is_numeric($num2) || !is_string($operator)){

//     }

//     if ($operator)

//     $result = 0;
    
//     return $result;
// }

function primeNumbers()
{

}

function factorial()
{

}

function palindrome()
{

}

function table()
{

}

function vowelCounter()
{

}

function gradeAverage()
{

}

function interestCalculator()
{

}

?>