<?php

// Deel 1
// a) Voeg een waarde toe zonder de regel zoals die hierboven is gegeven aan te passen. Dus maak een tweede regel waarin je een waarde toevoegt aan het array.
$myArray = ['auto', 'fiets', 'brommer', 'bus', 'vliegtuig', 'trein'];


// b) Druk alle waarden van het array af.
echo "Deel 1:<br>";
foreach ($myArray as $value) {
    echo $value . "<br>";
}

// Deel 2
// Bepaal het aantal elementen en druk dat af.
echo "<br>Deel 2:<br>";
echo "Het array heeft " . count($myArray) . " elementen.<br>";
$myArray[6] = 'helikopter';
echo "Het array heeft " . count($myArray) . " elementen.<br>";

// Deel 3
echo "<br>Deel 3:<br>";
echo "Regel 2: " . $myArray[1] . "<br>";
echo "Regel 5: " . $myArray[4] . "<br>";
echo "Regel 8: " . $myArray[6] . "<br>";
if (isset($myArray[8])) {
    echo "Regel 9: " . $myArray[8] . "<br>";
} else {
    echo "Regel 9: Ongedefinieerd<br>";
}
if (isset($myArray[11])) {
    echo "Regel 12: " . $myArray[11] . "<br>";
} else {
    echo "Regel 12: Ongedefinieerd<br>";
}
if (isset($myArray[18])) {
    echo "Regel 19: " . $myArray[18] . "<br>";
} else {
    echo "Regel 19: Ongedefinieerd<br>";
}

// Deel 4A
echo "<br>Deel 4A:<br>";
$scores = [7.8, 9.6, 8.2, 6.9, 7.5];
$total = array_sum($scores);
$average = round($total / count($scores), 1);
echo "Gemiddelde: " . $average . "<br>";

// Deel 4B
// Ik denk dat het beter is om regel 6 en 7 samen te voegen, omdat het de code verkort en het gemakkelijker leesbaar maakt. Het helpt ook bij het verminderen van repetitieve code.
?>