<?php
    #1
    function blocks_calc($wall_width, $wall_height) {
        $block_width = 0.6;
        $block_height = 0.25;
        if($wall_height > 3) {
            return 'The wall should not exceed 3 meters';
        } else {
            $result = ($wall_width * $wall_height) / ($block_width * $block_height);
            return intval($result) . ' ' . 'blocks are needed to build a wall';
        }
    }

    print(blocks_calc(2, 2.4));

    #2
    # a. 100.00 - 100 - false
    # b. "zero" - false
    # c. "false" - false
    # d. 0 + "true" - true
    # e. 0.000 - false
    # f. "0.0" - false
    # g. strcmp("false","False") - true - ადარებს რეგისტრის მიხედვით.

    #3
    /*
     * დაგვიბრუნებს else-დან "Message 3"-ს, რადგან
     * if და else if-ში გაწერილი პირობები არ აბრუნებენ
     * ჭეშმარიტ მნიშვნელობას.
     * დაპრინტავს: "Age: 12, Shoe Size: 14"
     */

    #4
    $hours_array = [];
    $hour = 1;
    while($hour <= 24) {
        array_push($hours_array, $hour);
        $hour++;
    }

    #5
    print '<table border="1">';
    foreach($hours_array as $value) {
        print "<tr><td>$value</td></tr>";
    }
    print '</table>';

    #6
    print '<table border="1">';
    for($i = 1; $i <= count($hours_array); $i++) {
        print "<tr><td>$i</td></tr>";
    }
    print '</table>';

    #7
    $color = 'red';
    switch($color) {
        case 'red':
            print "Red: Strawberry";
            break;
        case 'green':
            print "Green: Apple";
            break;
        case 'orange':
            print "Orange";
            break;
        default:
            print 'Unknown fruit';
            break;
    }
?>