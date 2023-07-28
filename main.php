<?php

function welcome($title){
    printer($title." started!\n\n");
}

// Start the program.
function main() {
    $choice = (int) -1;

    // Welcome
    printer("Welcome to my exercises!\n");

    while ($choice != 0) {

        // Ask the user for their choice.
        $choice = readprinter("Choose an option from 1 to 8 to access exercises, or 0 to quit: ");
    
        // If the user chooses an option from 1 to 8, do something.
        switch($choice){
            case 1:
                welcome("Calculator");
                exercise1();
                break;
            case 2:
                welcome("Prime Numbers");
                exercise2();
                break;
            case 3:
                welcome("Factorial");
                exercise3();
                break;
            case 4:
                welcome("Palindrome");
                exercise4();
                break;
            case 5:
                welcome("Table");
                exercise5();
                break;
            case 6:
                welcome("Vowel Counter");
                exercise6();
                break;
            case 7:
                welcome("Grade Average");
                exercise7();
                break;
            case 8:
                welcome("Interest Calculation");
                exercise8();
                break;
            case 0:
                printer("The program has ended.\n\n");
                exit;
            default:
                printer("Invalid option. Please try again.\n\n");
                break;
        }
    }
} main();

// Exercise 1 Calculator
// Realize chosen operation with two numbers
function exercise1() {
    $num1 = "";
    $num2 = "";
    $operator = "";
    $result = 0;
    $repeat = 0;

    while(!is_numeric($num1)) {
        $num1 = readprinter("Choose first number: ");
    }

    while(!is_numeric($num2)) {
        $num2 = readprinter("Choose second number: ");
    }

    while(!in_array($operator, ["+", "-", "*", "/"])) {
        $operator = readprinter("Which operation would you like to perform? ");
    }
    
    switch($operator){
        case "+":
            $result = $num1 + $num2;
            break;
        case "-":
            $result = $num1 - $num2;
            break;
        case "*":
            $result = $num1 * $num2;
            break;
        case "/":
            $result = $num1 / $num2;
            break;
        default:
            $result = 0;
            break;
    }

    printer("Result is: ".$result."\n\n");

    // Ask to repeat
    $repeat = readprinter("Would you like to do another operation?\nType 1 to repeat or another key to no: ");
    echo "\n";
    if ($repeat==1) {
        exercise1();
    }
}

// Exercise 2 Prime Numbers
// Check if number is prime. Then print that 10 first prime numbers after chosen number
function exercise2() {
    $firstPrimes = [];

    $num = "";
    $repeat = 0;

    while(!is_numeric($num)) {
        $num = readprinter("Choose a number to check if is prime: ");
    }

    $currentNum = $num+1;

    // Find 10 first prime numbers after $num
    for ($c = 0; $c < 10; $c++) {
        $isPrime = true;

        for ($j = $currentNum-1;$j >= 2;$j--) {
            if ($currentNum % $j == 0) {
                $isPrime = false;
                $c--;
                break;
            }
        }

        if ($isPrime) {
            array_push($firstPrimes, $currentNum); 
        }
        $currentNum++;
    }

    // Check if $num is prime
    if ($num == 1 || $num == 2) {
        printer("The number ".$num." not is prime.\n");
    } else {
        for ($i = $num-1; $i >= 2; $i--) {
            if ($num % $i == 0) {
                printer("The number ".$num." not is prime.\n");
                break;
            } else {
                if ($i == 2) {
                    printer("The number ".$num." is prime.\n");
                    break;
                }
            }
        }
    }

    printer("10 first prime numbers after ".$num." is: ".implode(' ', $firstPrimes)."\n\n");

    // Ask to repeat
    $repeat = readprinter("Would you like to check another number?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise2();
    }
}

// Exercise 3 Factorial
// Calculate the factorial result of number
function exercise3() {
    $num = "";
    $repeat = 0;

    while(!is_numeric($num)) {
        $num = readprinter("Choose a number to get factorial: ");
    }

    printer("Result is: ".factorial($num)."\n\n");

    // Ask to repeat
    $repeat = readprinter("Would you like to calculate another number?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise3();
    }
}

// Exercise 4 Palindrome
// Check if word is palindrome
function exercise4() {
    $word = "";
    $repeat = 0;

    while(!isWord($word)) {
        $word = readprinter("Type a word to check if is palindrome: ");
    }

    if (strtolower($word) === strrev(strtolower($word))) {
        printer("The word ".$word." is palindrome");
    } else {
        printer("The word ".$word." isn't palindrome");
    }

    echo "\n\n";

    // Ask to repeat
    $repeat = readprinter("Would you like to check another word?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise4();
    }
}

// Exercise 5 Table
// Create a table with a number
function exercise5() {
    $num = "";
    $repeat = 0;

    while(!is_numeric($num)) {
        $num = readprinter("Type a number to create a table: ");
    }

    $num = round($num);

    for ($i = 0; $i < $num; $i++) {
        for ($j = 0; $j < $num; $j++) {
            printer("$num\t");
        }
        echo "\n\n";
    }

    echo "\n\n";

    // Ask to repeat
    $repeat = readprinter("Would you like to create another table?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise5();
    }
}

// Exercise 6 Vowel Counter
// Count quantity of vowels in sentence
function exercise6() {
    $sentence = "";
    $repeat = 0;
    $vowels = array("a", "e", "i", "o", "u");

    while(!isSentence($sentence)) {
        $sentence = readprinter("Type a sentence to count the vowels: ");
    }

    $count = 0;

    foreach (str_split($sentence) as $char) {
        if (in_array($char, $vowels)) {
          $count++;
        }
    }

    printer("The sentence have ".$count." vowels.");

    echo "\n\n";

    // Ask to repeat
    $repeat = readprinter("Would you like to count vowels in another sentence?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise6();
    }
}

// Exercise 7 Grade Average
// Sum grade of student and take average
function exercise7() {
    $grades = ["", "", ""];
    $repeat = 0;
    $result = 0;

    while(!is_numeric($grades[0])) {
        $grades[0] = readprinter("Type first grade: ");
    }

    while(!is_numeric($grades[1])) {
        $grades[1] = readprinter("Type second grade: ");
    }

    while(!is_numeric($grades[2])) {
        $grades[2] = readprinter("Type third grade: ");
    }

    foreach ($grades as $grade) {
        $result += $grade;
    }

    $result = number_format($result / count($grades), 1, ".");

    printer("The average grade this student is: ".$result);

    echo "\n\n";

    // Ask to repeat
    $repeat = readprinter("Would you like to calculate average for another student?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise7();
    }
}

// Exercise 8 Interest Calculation
// Calculate the final value of an investiment based on:
// initial capital, interest rate, investment time(in months)
function exercise8() {
    $initialCapital = "";
    $interestRate = "";
    $investmentInMonths = "";
    $repeat = 0;
    $result = 0;

    while(!is_numeric($initialCapital)) {
        $initialCapital = readprinter("Type the initial capital value: ");
    }

    while(!is_numeric($interestRate)) {
        $interestRate = readprinter("Type the interest rate value: ");
    }

    while(!is_numeric($investmentInMonths)) {
        $investmentInMonths = readprinter("Type the months of investiment: ");
    }

    $result = $initialCapital * (1 + ($interestRate / 100)) ** ($investmentInMonths/12);

    $result = "$".number_format($result, 2, ".", ",");

    printer("This investment will have a final value of ".$result);

    echo "\n\n";

    // Ask to repeat
    $repeat = readprinter("Would you like to calculate another investment?\nType 1 to repeat or another key to no: ");
    echo("\n");
    if ($repeat==1) {
        exercise8();
    }
}

// factorial calculation
function factorial($num) {
    if ($num == 0) {
        return 1;
    } else {
        return $num * factorial($num - 1);
    }
}

function isWord($string) {
    $pattern = '/^[a-zA-Z]+$/';
    $words = explode(" ", $string);
    if (preg_match($pattern, $string) && count($words) == 1) {
      return true;
    } else {
      return false;
    }
}

function isSentence($string) {
    $words = explode(" ", $string);
    if (count($words) > 1) {
      return true;
    } else {
      return false;
    }
}

function printer($string) {
    for ($i = 0; $i < strlen($string); $i++) {
        echo $string[$i];
        usleep(30000);
    }
}

function readprinter($string) {
    printer($string);
    return readline();
}

?>