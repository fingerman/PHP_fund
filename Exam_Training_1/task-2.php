<?php

/*
 * Your task is to write a PHP program that reads 2 dates and several holidays, calculates the workdays in that period, and prints each workday date in the format "d-m-Y" in an ordered list in HTML.
Assume that a workday is any day of the week from Monday to Friday and is NOT in the given holidays. For example, we are given the dates: 17-12-2014 and 31-12-2014 and the holidays 31-12-2014, 24-12-2014, 08-12-2014. There are 15 days in the time period between 17-12-2014 and 31-12-2014. After subtracting all weekends (Saturdays and Sundays) and holidays, there are a total of 9 workdays left. Finally, we print each of those dates as list items in an ordered list.
1.	17-12-2014
2.	18-12-2014
3.	19-12-2014
4.	22-12-2014
5.	23-12-2014
6.	25-12-2014
7.	26-12-2014
8.	29-12-2014
9.	30-12-2014
In case no workdays are found, only print "No workdays" in <h2></h2> heading tags.
Input
The input will be read from an HTTP GET request. The first date will be received from a text input field with name 'dateOne'. The second date will be received from a text input field with name 'dateTwo'. The holidays will be received from a textarea with name 'holidays', holding each holiday on a separate line.
Output
If there are no workdays in the given period, "No workdays" should be printed. Otherwise, print each workday in <li></li> tags in an ordered list <ol></ol>. The output should be formatted exactly like in the example below.
Constraints
•	The holidays will be no more than 10.
•	All dates will be in the format "d-m-Y".
•	Date two will NOT be before date one.
********************************************************
 * Input
dateOne	17-12-2014
dateTwo	31-12-2014
holidays	31-12-2014
24-12-2014
08-12-2014
Output
<ol>
<li>17-12-2014</li>
<li>18-12-2014</li>
<li>19-12-2014</li>
<li>22-12-2014</li>
<li>23-12-2014</li>
<li>25-12-2014</li>
<li>26-12-2014</li>
<li>29-12-2014</li>
<li>30-12-2014</li>
</ol>
 *
 */









$from = new DateTime($_GET['dateOne']);
$to = new DateTime($_GET['dateTwo']);
$holidays = explode(PHP_EOL, $_GET['holidays']);
$output = "";
for ($date = $from; $date <= $to; $date = $date->add(new DateInterval("P1D"))) {
    if($date->format("l") == 'Saturday' ||
        $date->format("l") == 'Sunday' ||
        in_array($date->format('d-m-Y'), $holidays))  {
        continue;
    }
    $output .= "<li>".$date->format("d-m-Y")."</li>";
}
if (!$output) {
    echo "<h2>No workdays</h2>";
} else {
    echo "<ol>".$output."</ol>";
}


