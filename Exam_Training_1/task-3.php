<?php


/*
 *
 * Write a PHP script that takes as input a text and line length and formats the text so that it fits inside several rows, each with length equal to the given line length. Once the text is fitted, each character starts dropping wherever there is an empty space.
For example, we are given the text "The Milky Way is the galaxy that contains our star system" and line length of 10. If we distribute the text characters such that the text fits in lines with length 10, the result is:

Text characters start 'falling' until no whitespace remain under any character. The resulting text should be printed as an HTML table with each character in <td></td> tags.
Input
The input will be read from an HTTP GET request holding parameters named text and lineLength.
Output
The output consists of the HTML table. Everything should be put inside <table><table> tags. Each line should be printed in <tr></tr> tags. Each character should be printed in <td></td> tags (encode the HTML special characters with the htmlspecialchars() function). Print space " " in all empty cells. See the example below.
Constraints
•	The line length will be integer in the range [1...30]. The text will consist [1…1000] ASCII characters.
Example
Input
text	The Milky Way is the galaxy that contains our star system
lineLength	10
Output
<table><tr><td> </td><td> </td><td> </td><td> </td><td>M</td><td> </td><td> </td><td> </td><td> </td><td> </td></tr><tr><td> </td><td>h</td><td>e</td><td> </td><td>i</td><td>i</td><td>l</td><td> </td><td>y</td><td> </td></tr><tr><td>T</td><td>a</td><td>y</td><td>l</td><td>a</td><td>s</td><td>y</td><td>k</td><td>h</td><td>e</td></tr><tr><td>W</td><td>g</td><td>a</td><td>c</td><td>o</td><td>x</td><td>t</td><td>t</td><td>t</td><td>h</td></tr><tr><td>a</td><td>t</td><td>o</td><td>u</td><td>r</td><td>n</td><td>s</td><td>a</td><td>i</td><td>n</td></tr><tr><td>s</td><td>s</td><td>y</td><td>s</td><td>t</td><td>e</td><td>m</td><td>t</td><td>a</td><td>r</td></tr><table>

 *
 *
 *
 *
 *
 *
 */
$text = $_GET['text'];
$len = $_GET['lineLength'];

$matrix = [];
$row = 0;
$col = 0;
for ($i = 0; $i < strlen($text); $i++) {
    if ($i > 0 && $i % $len == 0) {
        $row++;
        $col = 0;
    }
    $matrix[$row][$col] = $text[$i];
    $col++;
}

$lastCol = count($matrix[$row]);
for ($i = $lastCol; $i < $len; $i++) {
    $matrix[$row][$i] = " ";
}

for ($c = 0; $c < $len; $c++) {
    $spaces = 0;
    for ($r = $row; $r >= 0; $r--) {
        if ($matrix[$r][$c] == " ") {
            $spaces++;
        } else {
            $char = $matrix[$r][$c];
            $matrix[$r][$c] = " ";
            $matrix[$r+$spaces][$c] = $char;
        }
    }
}

echo "<table>";
for ($row = 0; $row < count($matrix); $row++) {
    echo "<tr>";
    for ($col = 0; $col < count($matrix[$row]); $col++) {
        echo "<td>".htmlspecialchars($matrix[$row][$col])."</td>";
    }
    echo "</tr>";
}
echo "<table>";