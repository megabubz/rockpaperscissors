
//REFERENCING AJAX PHP GET HINT EXAMPLE 

function Play(strChoice) {

// if the string is empty, do nothing.... 

    if (strChoice.length == 0) {
        document.getElementById("results").innerHTML = "";
        return;
        
// ...else,  when I've received an HTTP response then run this bit of code. 
        
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var jsonResponse = JSON.parse(this.responseText);
                document.getElementById("results").innerHTML = jsonResponse.result + " The computer chose: " + jsonResponse.computerchoice + "You chose: " + jsonResponse.playeraction;
            }
        };

// adds the players action to the URI. 'Choice' is a KEY and R would be a VALUE. PHP will then REQUEST the VALUE by calling the choice KEY.  

        xmlhttp.open("GET", 'GameFunctions.php?choice=' + strChoice, true);
        xmlhttp.send();
    }
}
       

