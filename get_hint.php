<?php
    $a[] = "laptop";
    $a[] = "earbuds";
    $a[] = "camera";

    $q = $_REQUEST["q"];

    $suggestion = "";

    if ($q !== "") {
        $q = strtolower($q);
        $len = strlen($q);

        foreach($a as $name) {
            if (stristr($q, substr($name, 0, $len))) {
                if ($suggestion === "") {
                    $suggestion = $name;
                } else {
                    $suggestion .= ", $name";
                }
            }
        }
    }

    echo $suggestion === "" ? "no suggestion" : $suggestion;
?>