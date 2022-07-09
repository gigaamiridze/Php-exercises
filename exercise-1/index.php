<?php
    // #1
    print 'How are you?' . '<br>';
    print 'I\'m fine';

    print '<br>';

    // #2
    $first_name = 'Giga';
    $last_name = 'Amiridze';
    $full_name = $first_name . ' ' . $last_name;
    print $full_name;

    print '<br>';

    // #3
    $html = '<span class="{class}">fried fish</span><span class="{class}">fried chicken</span>';
    $replacedStr = str_replace("{class}", "dinner", $html);
    print $replacedStr;

    print '<br>';

    // #4
    print (2 + 4 * 10) / (9 - 2);

    print '<br>';

    // #5
    $array = [
        "Tbilisi" => 2000000,
        "Rustavi" => 1000000,
        "Kutaisi" => 999000,
        "Batumi" => 1400000,
        "Telavi" => 750000
    ];

    // #6
    arsort($array);

    foreach($array as $city => $popultion) {
        print $city . ' ' . $popultion;
        print '<br>';
    }

    // #7
    $order_price = (2 * 7) + (3 * 2.45) + (2 * 1.75) % 7;
    print $order_price;
?>