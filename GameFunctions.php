<?php

// EXERCISE 16

// 'choice' relates to this line in .js file: xmlhttp.open("GET", 'GameFunctions.php?choice=' + strChoice, true);
// whatever the player clicked on will now be stored in $playeraction, which will allow the CalculateWinner() function to see who won.
$playeraction = $_REQUEST['choice'];

// the winner is calculated and stored in $result variable
$result = calculateWinner($playeraction);

// Javascript file accesses the json below.
// We create an associative array or a map or a dictionary. this is going to help us display who played what, and who won the game.
// https://stackoverflow.com/questions/4064444/returning-json-from-a-php-script
//if you don't write this, json will display the text as a string in quotation marks. it will encode the variable $displayresults.
$displayresults = ['playeraction' => $playeraction, 'computerchoice' => $computerchoice, 'result' => $result]; 
header('Content-Type: application/json');
echo json_encode($displayresults);


// Give it the variable that's out of scope by passing it into the brackets. When you call the function, you should also pass it the info it needs there too.
function calculateWinner($playeraction) {

   
    // computer choice is turned from a random integer into R, P or S in the array.
$user_value = ['R', 'P', 'S'];
$computeraction = rand(0, 2);
$computerchoice = $user_value[$computeraction];





$userdraw = "It's a draw " . PHP_EOL;
$userlose = "You lost " . PHP_EOL;
$userwin = "You won " . PHP_EOL;

    switch ($playeraction) {
        case 'R':
            if ($computeraction == 'R') {
                return $userdraw;
            } elseif ($computeraction == 'P') {
                 return $userlose;
            } else {
               return $userwin;
            }
            break;

        case 'P':
            if ($computeraction == 'P') {
                return $userdraw;
            } elseif ($computeraction == 'S') {
                 return $userlose;
            } else {
                return $userwin;
            }
            break;


        case 'S':
            if ($computeraction == 'S') {
                return $userdraw;
            } elseif ($computeraction == 'R') {
                return $userlose;
            } else {
                return $userwin;
            }

            break;
        default: die("Please choose either 'R', 'P' or 'S' and ensure you type in uppercase.");
    }
}

